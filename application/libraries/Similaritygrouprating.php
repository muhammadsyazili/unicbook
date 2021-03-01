<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SimilarityGroupRating
{
    private $numberOfRow; //3
    private $numberOfColumn; //10

    private $dataValue = []; //ex : [[2, 3, 2, 3, 2, 3, 2, 3, 2, 3], [4, 5, 4, 5, 4, 5, 4, 5, 4, 5], [5, 6, 5, 6, 5, 6, 5, 6, 5, 6]]
    private $dataValueTranspose = []; //ex : [[2, 4, 5], [3, 5, 6], [2, 4, 5], [3, 5, 6], [2, 4, 5], [3, 5, 6], [2, 4, 5], [3, 5, 6], [2, 4, 5], [3, 5, 6]]

    private $similarityGroupAsoc = []; //ex : ["1|2" => 1.75, "1|3" => 2.75, "2|3" => 3.75]

    public function __construct($params)
    {
        $this->dataValue = $params["dataValue"];

        $this->numberOfRow = count($params["dataValue"]);
        $this->numberOfColumn = count($params["dataValue"][0]);
    }

    public function exec()
    {
        $this->transpose();

        $iter = 0;
        for ($i=0; $i < $this->numberOfRow; $i++) { 
            for ($j=0; $j < $this->numberOfRow-($i+1); $j++) { 
                $simAB = 0;
                $simA = 0;
                $simB = 0;

                for ($k=0; $k < $this->numberOfColumn; $k++) {
                    $simAB += ($this->dataValue[$i][$k] - $this->calc_average($k)) * ($this->dataValue[$i+$j+1][$k] - $this->calc_average($k));

                    $simA += pow(($this->dataValue[$i][$k] - $this->calc_average($k)), 2);
                    $simB += pow(($this->dataValue[$i+$j+1][$k] - $this->calc_average($k)), 2);
                }

                $temp = 0;
                if ((sqrt($simA) * sqrt($simB)) == 0) {
                    $temp = 0;
                } else {
                    $temp = $simAB / (sqrt($simA) * sqrt($simB));
                }
                
                $this->similarityGroupAsoc[sprintf("%d|%d", $i, $i+$j+1)] = $temp;
                $iter++;
            }
        }
    }

    private function calc_average($rowIndex)
    {
        $temp = 0;
        for ($i=0; $i < $this->numberOfRow; $i++) { 
            $temp += $this->dataValueTranspose[$rowIndex][$i]; //[number of cluster][number of book]
        }
        return $temp / $this->numberOfRow;
    }

    private function transpose()
    {
        for ($i=0; $i < $this->numberOfRow; $i++) { 
            for ($j=0; $j < $this->numberOfColumn; $j++) { 
                $this->dataValueTranspose[$j][$i] = $this->dataValue[$i][$j];
            }
        }
    }

    public function getSimilarityGroupAsoc() //ex : ["1|2" => 1.75, "1|3" => 2.75, "2|3" => 3.75]
    {
        return $this->similarityGroupAsoc;
    }
}