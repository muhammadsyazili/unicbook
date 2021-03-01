<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediction
{
    private $numberOfRow; //3
    private $numberOfColumn; //10

    private $resultLinierCombinationSimilarityAsoc = []; //ex : ["1|1" => 0, "1|2" => 1.5, "1|3" => 2.5, "2|1" => 1.5, "2|2" => 0, "2|3" => 3.5, "3|1" => 2.5, "3|2" => 3.5, "3|3" => 0]

    private $dataPath = []; //ex : [ISBN2, ISBN4, ISBN5]
    private $dataValue = []; //ex : [[2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]
    private $dataStatus = []; //ex : [1, 1, 0]

    private $resultPredic = []; //ex : [[2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5], [4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5], [5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5]]
    private $resultPredicAsoc = []; //ex : ["ISBN2" => [2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5], "ISBN4" => [4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5], "ISBN5" => [5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5, 5.5]]

    private $sumResultPredic = []; //ex : ["ISBN2" => 2.5, "ISBN4" => 4.5, "ISBN5" => 5.5]

    public function __construct($params)
    {
        $this->resultLinierCombinationSimilarityAsoc = $params["resultLinierCombinationSimilarityAsoc"];

        $this->dataValue = $params["dataValue"];
        $this->dataPath = $params["dataPath"];
        $this->dataStatus = $params["dataStatus"];

        $this->numberOfRow = count($params["dataValue"]);
        $this->numberOfColumn = count($params["dataValue"][0]);
    }

    public function exec()
    {
        for ($i=0; $i < $this->numberOfRow; $i++) { 
            for ($j=0; $j < $this->numberOfColumn; $j++) {
                $up = 0;
                $down = 0;
                for ($k=0; $k < $this->numberOfRow; $k++) { 
                    if ($this->dataStatus[$k] == 1) {
                        $up += ($this->dataValue[$k][$j] - $this->calc_average($k)) * $this->resultLinierCombinationSimilarityAsoc[$i][$k];
                    } else {
                        $up += $this->dataValue[$k][$j] * $this->resultLinierCombinationSimilarityAsoc[$i][$k];
                    }
                    $down += abs($this->resultLinierCombinationSimilarityAsoc[$i][$k]);
                }

                $temp = 0;
                if (($up / $down) == 0) {
                    $temp = 0;
                } else {
                    $temp = $this->calc_average($i) + ($up / $down);
                }
                 
                $this->resultPredic[$i][$j] = $temp;
            }
        }

        for ($i=0; $i < $this->numberOfRow; $i++) {
            $sumPredic = 0; 
            for ($j=0; $j < $this->numberOfColumn; $j++) { 
                $sumPredic += $this->resultPredic[$i][$j];
            }
            $this->sumResultPredic[$this->dataPath[$i]] = $sumPredic / $this->numberOfColumn;
            $this->resultPredicAsoc[$this->dataPath[$i]] = $this->resultPredic[$i];
        }
    }

    private function calc_average($bookIndex)
    {
        $temp = 0;
        for ($i = 0; $i < $this->numberOfColumn; $i++) {
            $temp += $this->dataValue[$bookIndex][$i];
        }
        return $temp / $this->numberOfColumn;
    }

    public function getSumResultPredic() //[number of one cluster] ex : ["ISBN2" => 2.75, "ISBN4" => 4.75, "ISBN5" => 5.75]
    {
        arsort($this->sumResultPredic);
        return $this->sumResultPredic;
    }

    public function getResultPredic() //[number of one cluster][number of column] ex : ["ISBN2" => [2.75, 2.75, 2.75, 2.75, 2.75, 2.75, 2.75, 2.75, 2.75, 2.75], "ISBN4" => [4.75, 4.75, 4.75, 4.75, 4.75, 4.75, 4.75, 4.75, 4.75, 4.75], "ISBN5" => [5.75, 5.75, 5.75, 5.75, 5.75, 5.75, 5.75, 5.75, 5.75, 5.75]]
    {
        krsort($this->resultPredicAsoc);
        return $this->resultPredicAsoc;
    }
}
