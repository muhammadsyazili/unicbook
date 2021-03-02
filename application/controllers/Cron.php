<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('bookModel');
        $this->load->model('userModel');
        $this->load->model('ratingModel');
    }

    public function index($id, $loop, $password)
    {
        if ($password == "dinahosting") {
            for ($i=0; $i < $loop; $i++) { 
                $this->otomatic_job($id);
            }
        }
    }

    private function otomatic_job($book_id)
    {
        $start_compute = microtime(true);
        $this->create_dataset();

        $data["dataPath"] = $this->datasetPathsBeforeKmeans;
        $data["dataValue"] = $this->datasetValuesBeforeKmeans;
        $data["numberOfCluster"] = 10;
        
        $this->load->library("kmeans", $data);
        $result = $this->kmeans->exec();
        
        // mencari cluster berdasarkan BOOK_ID yang dipilih
        $cluster = 0;
        for ($i=0; $i < count($result); $i++) { 
            if ($result[$i][1] == $book_id) {
                $cluster = $result[$i][0];
            }
        }
        
        //seleksi data yang satu cluster dengan BOOK_ID yang dipilih
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
            $users = $this->userModel->read(); 
            for ($j=0; $j < count($users); $j++) { 
                $rating_real_all_user[$i][$j] = $this->ratingModel->readWhere(["rates.BOOK_ID" => $keysWithinSum[$i], "rates.USER_ID" => $users[$j]->USER_ID]) == NULL ? 0 : $this->ratingModel->readWhere(["rates.BOOK_ID" => $keysWithinSum[$i], "rates.USER_ID" => $users[$j]->USER_ID])->RATE;
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

        $this->db->insert('results', ["data_hasil.MAE" => $mean_MAE, "data_hasil.TE" => $time_execution])->insert_id();
    }

    private function create_dataset()
    {
        $books = $this->bookModel->read();
        for ($i = 0; $i < count($books); $i++) {
            $this->datasetPathsBeforeKmeans[$i] = $books[$i]->BOOK_ID;
            $users = $this->userModel->read();
            
            $status = 0;
            for ($j = 0; $j < count($users); $j++) {
                if ($i == 0) $this->datasetUserBeforeKmeans[$users[$j]->USER_ID] = $j;

                $result = $this->ratingModel->readWhere(['rates.USER_ID' => $users[$j]->USER_ID, 'rates.BOOK_ID' => $books[$i]->BOOK_ID]);

                if ($result == null) {
                    $this->datasetValuesBeforeKmeans[$i][$j] = 0;
                    $status++;
                } else {
                    $this->datasetValuesBeforeKmeans[$i][$j] = $result->RATE;
                }
            }

            $this->datasetStatusBeforeKmeans[$i] = $status == count($users) ? 0 : 1;
        }
    }
}