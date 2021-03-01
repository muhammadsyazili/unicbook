<?php
// asumsi book 5 & user 10 & cluster 2
class Kmeans
{
    private $numberOfRow; //5 -> reference to number of book
    private $numberOfColumn; //10 -> reference to number of user

    private $dataPath = []; //[ISBN1, ISBN2, ISBN3, ISBN4, ISBN5]
    private $dataValue = []; //[[1, 1, 1, 1, 1, 1, 1, 1, 1, 1], [2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [3, 3, 3, 3, 3, 3, 3, 3, 3, 3], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]
    private $numberOfCluster; //2

    private $centroidsNow = []; //[number of cluster][number of column] ex : [[1, 2, 1, 2, 1, 2, 1, 2, 1, 2], [5, 6, 5, 6, 5, 6, 5, 6, 5, 6]]
    private $centroidsOld = []; //[number of cluster][number of column] ex : [[4, 5, 4, 5, 4, 5, 4, 5, 4, 5], [6, 7, 6, 7, 6, 7, 6, 7, 6, 7]]

    private $distances = []; //[number of row][number of cluster] ex : [[5, 7], [3, 5], [7, 9], [1, 3], [9, 1]]

    //berisikan klaster dari setiap row
    private $groupingIndex = []; //[number of row] ex : [1, 1, 2, 1, 2]

    //berisikan jarak terkecil terhadap masing-masing klaster dari setiap row
    private $groupingValue = []; //[number of row] ex : [4, 5, 9, 4, 9]

    public function __construct($params)
    {
        $this->dataPath = $params["dataPath"];
        $this->dataValue = $params["dataValue"];

        $this->numberOfCluster = $params["numberOfCluster"];

        $this->numberOfRow = count($params["dataValue"]);
        $this->numberOfColumn = count($params["dataValue"][0]);
    }

    public function exec() //[number of row][index 0: cluster, index 1: path][[0, ISBN1], [1, ISBN2], [0, ISBN3], [1, ISBN4], [1, ISBN5]]
    {
        $convergentionCheck = false;
        $this->centroidsNow = $this->generate_early_centroid(
            $this->get_min_value($this->dataValue),
            $this->get_max_value($this->dataValue),
            $this->numberOfCluster,
            $this->numberOfColumn
        );

        do {
            for ($i = 0; $i < $this->numberOfRow; $i++) {
                for ($j = 0; $j < $this->numberOfCluster; $j++) {
                    $this->distances[$i][$j] = $this->cal_distance($this->dataValue[$i], $this->centroidsNow[$j]);
                }
            }

            $this->grouping($this->distances);

            $this->centroidsOld = $this->centroidsNow;

            $this->centroidsNow = $this->generate_new_centroid();

            for ($i = 0; $i < $this->numberOfCluster; $i++) {
                if (!empty(array_diff($this->centroidsNow[$i], $this->centroidsOld[$i]))) {
                    $convergentionCheck = true;
                    break;
                }
                $convergentionCheck = false;
            }
        } while ($convergentionCheck);

        $resultClustering = [];
        for ($i = 0; $i < $this->numberOfRow; $i++) {
            $resultClustering[$i][0] = $this->groupingIndex[$i];
            $resultClustering[$i][1] = $this->dataPath[$i];
        }
        return $resultClustering;
    }

    private function generate_early_centroid($min, $max, $numberOfCluster, $numberOfColumn) //[number of cluster][number of column] ex : [[1, 2, 1, 2, 1, 2, 1, 2, 1, 2], [5, 6, 5, 6, 5, 6, 5, 6, 5, 6]]
    {
        $temp = [];
        for ($i = 0; $i < $numberOfCluster; $i++) {
            for ($j = 0; $j < $numberOfColumn; $j++) {
                $temp[$i][$j] = rand($min, $max);
            }
        }
        return $temp;
    }

    private function cal_distance($x, $y)
    {
        $sum = 0;
        for ($i = 0; $i < $this->numberOfColumn; $i++) {
            $sum += abs(pow($x[$i] - $y[$i], 2));
        }
        return sqrt($sum);
    }

    private function grouping($distances)
    {
        for ($i = 0; $i < $this->numberOfRow; $i++) {
            $value = $distances[$i][0];
            $index = 0;
            for ($j = 0; $j < $this->numberOfCluster; $j++) {
                if ($distances[$i][$j] <= $value) {
                    $value = $distances[$i][$j];
                    $index = $j;
                }
            }
            $this->groupingValue[$i] = $value;
            $this->groupingIndex[$i] = $index;
        }
    }

    private function generate_new_centroid() //[number of cluster][number of column] ex : [[1, 2, 1, 2, 1, 2, 1, 2, 1, 2], [5, 6, 5, 6, 5, 6, 5, 6, 5, 6]]
    {
        $newCentroids = [];
        for ($i = 0; $i < $this->numberOfCluster; $i++) {
            for ($j = 0; $j < $this->numberOfColumn; $j++) {

                $sumOfSameCluster = 0;
                $numberOfOneCluster = 0;
                for ($k = 0; $k < $this->numberOfRow; $k++) {
                    if ($this->groupingIndex[$k] == $i) {
                        $sumOfSameCluster += $this->dataValue[$k][$j];
                        $numberOfOneCluster++;
                    }
                }

                $numberOfOneCluster == 0 ? $newCentroids[$i][$j] = 0 : $newCentroids[$i][$j] = $sumOfSameCluster / $numberOfOneCluster;
            }
        }
        return $newCentroids;
    }

    private function get_min_value($data)
    {
        $min = 99999;
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                if ($min > $data[$i][$j]) {
                    $min =  $data[$i][$j];
                }
            }
        }
        return $min;
    }

    private function get_max_value($data)
    {
        $max = 0;
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                if ($max < $data[$i][$j]) {
                    $max = $data[$i][$j];
                }
            }
        }
        return $max;
    }

    public function get_final_distances() //[number of row][number of cluster] ex : ["ISBN1" => [5, 7], "ISBN2" => [3, 5], "ISBN3" => [7, 9], "ISBN4" => [1, 3], "ISBN5" => [9, 1]]
    {
        $distancesAsoc = [];
        for ($i=0; $i < $this->numberOfRow; $i++) { 
            $distancesAsoc[$this->dataPath[$i]] = $this->distances[$i];
        }
        return $distancesAsoc;
    }
}
