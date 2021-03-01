<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LinierCombinationSimilarity
{
    private $resultItemRatingAsoc = []; //ex : ["1|2" => 1.5, "1|3" => 2.5, "2|3" => 3.5]
    private $resultGroupRatingAsoc = []; //ex : ["1|2" => 1.75, "1|3" => 2.75, "2|3" => 3.75]

    private $numberOfBook; //3
    private $c; //0.1

    private $linierCombinationSimilarityAsoc = []; //ex : ["1|1" => 0, "1|2" => 1.5, "1|3" => 2.5, "2|1" => 1.5, "2|2" => 0, "2|3" => 3.5, "3|1" => 2.5, "3|2" => 3.5, "3|3" => 0]

    public function __construct($params)
    {
        $this->resultItemRatingAsoc = $params["resultItemRatingAsoc"];
        $this->resultGroupRatingAsoc = $params["resultGroupRatingAsoc"];

        $this->numberOfBook = $params["numberOfBook"];
        $this->c = $params["c"];
    }

    public function exec()
    {
        for ($i = 0; $i < $this->numberOfBook; $i++) {
            for ($j = 0; $j < $this->numberOfBook; $j++) {
                if ($i == $j) {
                    $this->linierCombinationSimilarityAsoc[$i][$j] = 0;
                } elseif (array_key_exists(sprintf("%d|%d", $i, $j), $this->resultItemRatingAsoc) && array_key_exists(sprintf("%d|%d", $i, $j), $this->resultGroupRatingAsoc)) {
                    $this->linierCombinationSimilarityAsoc[$i][$j] = ($this->resultItemRatingAsoc[sprintf("%d|%d", $i, $j)] * (1 - $this->c)) + ($this->resultGroupRatingAsoc[sprintf("%d|%d", $i, $j)] * $this->c);
                } else {
                    $this->linierCombinationSimilarityAsoc[$i][$j] = ($this->resultItemRatingAsoc[sprintf("%d|%d", $j, $i)] * (1 - $this->c)) + ($this->resultGroupRatingAsoc[sprintf("%d|%d", $j, $i)] * $this->c);
                }
            }
        }
    }

    public function getLinierCombinationSimilarityAsoc() //ex : ["1|1" => 0, "1|2" => 1.5, "1|3" => 2.5, "2|1" => 1.5, "2|2" => 0, "2|3" => 3.5, "3|1" => 2.5, "3|2" => 3.5, "3|3" => 0]
    {
        return $this->linierCombinationSimilarityAsoc;
    }
}
