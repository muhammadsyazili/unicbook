<?php
defined('BASEPATH') or exit('No direct script access allowed');
// asumsi book 5 & user 10 & cluster 2
class Recommend extends CI_Controller
{
    //berisikan data path (ISBN) seluruh buku
    private $datasetPathsBeforeKmeans = []; //ex : [ISBN1, ISBN2, ISBN3, ISBN4, ISBN5]

    //berisikan data value (RATING) seluruh buku
    private $datasetValuesBeforeKmeans = []; //ex : [[1, 1, 1, 1, 1, 1, 1, 1, 1, 1], [2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [3, 3, 3, 3, 3, 3, 3, 3, 3, 3], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]

    //berisikan data status (0 : belum pernah di-rating, 1 : penah di-rating) seluruh buku
    private $datasetStatusBeforeKmeans = []; //ex : [1, 1, 0, 1, 0]

    //berisikan data id (USER_ID) seluruh user
    private $datasetUserBeforeKmeans = []; //ex : [USER1, USER2, USER3, USER4, USER5, USER6, USER7, USER8, USER9, USER10]

    //berisikan data path (ISBN) yang satu klaster dengan buku yang dipilih 
    private $datasetPathsAfterKmeans = []; //ex : [ISBN2, ISBN4, ISBN5]

    //berisikan data value (RATING) yang satu klaster dengan buku yang dipilih
    private $datasetValuesAfterKmeans = []; //ex : [[2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]

    //berisikan data status buku (0 : belum pernah di-rating, 1 : penah di-rating) yang satu klaster dengan buku yang dipilih
    private $datasetStatusAfterKmeans = []; //ex : [1, 1, 0]

    //berisikan data value (RATING) yang satu klaster dengan buku yang dipilih (mengambil data pra-kmeans)
    private $datasetValuesItemRating = []; //ex : [[2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]

    //berisikan data value (RATING) yang satu klaster dengan buku yang dipilih (mengambil data pasca-kmeans -> hasil perhitungan jarak iterasi terakhir kmeans)
    private $datasetValuesGroupRating = []; //ex : [[2, 3, 2, 3, 2, 3, 2, 3, 2, 3], [4, 5, 4, 5, 4, 5, 4, 5, 4, 5], [5, 6, 5, 6, 5, 6, 5, 6, 5, 6]]

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_buku_m');
        $this->load->model('data_user_m');
        $this->load->model('data_rating_m');

        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function show()
    {
        $ISBN = $this->input->post("filter");

        $start_compute = microtime(true);
        $this->create_dataset();

        $data["dataPath"] = $this->datasetPathsBeforeKmeans;
        $data["dataValue"] = $this->datasetValuesBeforeKmeans;
        $data["numberOfCluster"] = 10;
        
        $this->load->library("kmeans", $data, $object_name_custom);
        $result = $this->kmeans->exec();
        
        // mencari cluster berdasarkan ISBN yang dipilih
        $cluster = 0;
        for ($i=0; $i < count($result); $i++) { 
            if ($result[$i][1] == $ISBN) {
                $cluster = $result[$i][0];
            }
        }
        
        //seleksi data yang satu cluster dengan ISBN yang dipilih
        $iter = 0;
        for ($i=0; $i < count($result); $i++) {
            if ($result[$i][0] == $cluster) {
                $this->datasetPathsAfterKmeans[$iter] = $this->datasetPathsBeforeKmeans[$i];
                $this->datasetValuesAfterKmeans[$iter] = $this->datasetValuesBeforeKmeans[$i];
                $this->datasetStatusAfterKmeans[$iter] = $this->datasetStatusBeforeKmeans[$i];
                $iter++;
            }
        }

        // create data untuk perhitungan similarity item rating
        $iter = 0;
        for ($i=0; $i < count($result); $i++) {
            if ($result[$i][0] == $cluster) {
                $this->datasetValuesItemRating[$iter] = $this->datasetValuesBeforeKmeans[$i];
                $iter++;
            }
        }

        //similarity item rating
        $dataItemRating["dataValue"] = $this->datasetValuesItemRating;
        $this->load->library("similarityitemrating", $data);
        $this->similarityitemrating->exec();

        // create data untuk perhitungan similarity group rating
        for ($i=0; $i < count($this->datasetPathsAfterKmeans); $i++) { 
            $this->datasetValuesGroupRating[$i] = $this->kmeans->get_final_distances()[$this->datasetPathsAfterKmeans[$i]];
        }
        
        //similarity group rating
        $dataGroupRating["dataValue"] = $this->datasetValuesGroupRating;
        $this->load->library("similaritygrouprating", $dataGroupRating);
        $this->similaritygrouprating->exec();

        //linier combination similarity
        $dataLinierCombinationSimilarity["resultItemRatingAsoc"] = $this->similarityitemrating->getSimilarityItemAsoc();
        $dataLinierCombinationSimilarity["resultGroupRatingAsoc"] = $this->similaritygrouprating->getSimilarityGroupAsoc();
        $dataLinierCombinationSimilarity["numberOfBook"] = count($this->datasetPathsAfterKmeans);
        $dataLinierCombinationSimilarity["c"] = 0.1;
        $this->load->library("liniercombinationsimilarity", $dataLinierCombinationSimilarity);
        $this->liniercombinationsimilarity->exec();

        //prediction
        $dataPrediction["resultLinierCombinationSimilarityAsoc"] = $this->liniercombinationsimilarity->getLinierCombinationSimilarityAsoc();
        $dataPrediction["dataValue"] = $this->datasetValuesAfterKmeans;
        $dataPrediction["dataPath"] = $this->datasetPathsAfterKmeans;
        $dataPrediction["dataStatus"] = $this->datasetStatusAfterKmeans;
        $this->load->library("prediction", $dataPrediction);
        $this->prediction->exec();

        $finish_compute = microtime(true);

        $time_execution = $finish_compute - $start_compute;

        $keysWithinSum = array_keys($this->prediction->getSumResultPredic());
        $valuesWithoutSum = array_values($this->prediction->getResultPredic());

        $rating_real_all_user = [];
        for ($i=0; $i < count($keysWithinSum); $i++) {
            $users = $this->data_user_m->read(); 
            for ($j=0; $j < count($users); $j++) { 
                $rating_real_all_user[$i][$j] = $this->data_rating_m->readWhere(["data_rating.ISBN" => $keysWithinSum[$i], "data_rating.USER_ID" => $users[$j]->USER_ID]) == NULL ? 0 : $this->data_rating_m->readWhere(["data_rating.ISBN" => $keysWithinSum[$i], "data_rating.USER_ID" => $users[$j]->USER_ID])->RATING;
            }
        }

        $MAE = 0;
        for ($i=0; $i < count($valuesWithoutSum); $i++) {
            $sig = 0; 
            for ($j=0; $j < count($valuesWithoutSum[$i]); $j++) { 
                $sig += abs($valuesWithoutSum[$i][$j] - $rating_real_all_user[$i][$j]);
            }
            $MAE += $sig / count($valuesWithoutSum[$i]);
        }
        $mean_MAE = $MAE / count($valuesWithoutSum);

        $book_recommend = [];
        for ($i=0; $i < count($keysWithinSum); $i++) { 
            $book_recommend[$i]["book"] = $this->data_buku_m->readWhere(["data_buku.ISBN" => $keysWithinSum[$i]]);
            $book_recommend[$i]["rating_predic"] = $this->prediction->getResultPredic()[$keysWithinSum[$i]][$this->datasetUserBeforeKmeans[$this->session->userdata('user')]];
            $book_recommend[$i]["rating_real"] = $this->data_rating_m->readWhere(["data_rating.ISBN" => $keysWithinSum[$i], "data_rating.USER_ID" => $this->session->userdata('user')]) == NULL ? 0 : $this->data_rating_m->readWhere(["data_rating.ISBN" => $keysWithinSum[$i], "data_rating.USER_ID" => $this->session->userdata('user')])->RATING;
        }

        $data_content['book_selected'] = $this->data_buku_m->readWhere(["data_buku.ISBN" => $ISBN]);
        $data_content['book_rating_selected'] = array_key_exists($this->session->userdata('user'), $this->datasetUserBeforeKmeans) == false ? 0 : $this->prediction->getResultPredic()[$ISBN][$this->datasetUserBeforeKmeans[$this->session->userdata('user')]];
        $data_content['mean_MAE'] = $mean_MAE;
        $data_content['book_recommend'] = $book_recommend;
        $data_content['time_execution'] = $time_execution;

        $data_header['title'] = 'Hasil Rekomensdasi';
        $this->load->view('templates_administrator/header', $data_header);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('recommendation/recommendation', $data_content);
        $this->load->view('templates_administrator/footer');
    }

    private function create_dataset()
    {
        $books = $this->data_buku_m->read();
        for ($i = 0; $i < count($books); $i++) {
            $this->datasetPathsBeforeKmeans[$i] = $books[$i]->ISBN;
            $users = $this->data_user_m->read();
            
            $status = 0;
            for ($j = 0; $j < count($users); $j++) {
                if ($i == 0) $this->datasetUserBeforeKmeans[$users[$j]->USER_ID] = $j;

                $result = $this->data_rating_m->readWhere(['data_rating.USER_ID' => $users[$j]->USER_ID, 'data_rating.ISBN' => $books[$i]->ISBN]);

                if ($result == null) {
                    $this->datasetValuesBeforeKmeans[$i][$j] = 0;
                    $status++;
                } else {
                    $this->datasetValuesBeforeKmeans[$i][$j] = $result->RATING;
                }
            }

            $this->datasetStatusBeforeKmeans[$i] = $status == count($users) ? 0 : 1;
        }
    }
}
