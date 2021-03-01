<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SimilarityItemRating
{
    private $numberOfRow; //3
    private $numberOfColumn; //10

    private $dataValue = []; //ex : [[2, 2, 2, 2, 2, 2, 2, 2, 2, 2], [4, 4, 4, 4, 4, 4, 4, 4, 4, 4], [5, 5, 5, 5, 5, 5, 5, 5, 5, 5]]
    
    private $similarityItemAsoc = []; //ex : ["1|2" => 1.5, "1|3" => 2.5, "2|3" => 3.5]

    public function __construct($params)
    {
        $this->dataValue = $params["dataValue"];

        $this->numberOfRow = count($params["dataValue"]);
        $this->numberOfColumn = count($params["dataValue"][0]);
    }

    public function exec()
    {
        $iter = 0;
        for ($i = 0; $i < $this->numberOfRow; $i++) {
            for ($j = 0; $j < $this->numberOfRow - ($i + 1); $j++) {
                $simAB = 0;
                $simA = 0;
                $simB = 0;

                for ($k = 0; $k < $this->numberOfColumn; $k++) {
                    $simAB += ($this->dataValue[$i][$k] - $this->calc_average($i)) * ($this->dataValue[$i + $j + 1][$k] - $this->calc_average($i + $j + 1));

                    $simA += pow(($this->dataValue[$i][$k] - $this->calc_average($i)), 2);
                    $simB += pow(($this->dataValue[$i + $j + 1][$k] - $this->calc_average($i + $j + 1)), 2);
                }

                $temp = 0;
                if ((sqrt($simA) * sqrt($simB)) == 0) {
                    $temp = 0;
                } else {
                    $temp = $simAB / (sqrt($simA) * sqrt($simB));
                }

                $this->similarityItemAsoc[sprintf("%d|%d", $i, $i + $j + 1)] = $temp;
                $iter++;
            }
        }
    }

    private function calc_average($rowIndex)
    {
        $temp = 0;
        for ($i = 0; $i < $this->numberOfColumn; $i++) {
            $temp += $this->dataValue[$rowIndex][$i];
        }
        return $temp / $this->numberOfColumn;
    }

    public function getSimilarityItemAsoc() //ex : ["1|2" => 1.5, "1|3" => 2.5, "2|3" => 3.5]
    {
        return $this->similarityItemAsoc;
    }
}
