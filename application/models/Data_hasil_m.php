<?php
defined('BASEPATH') or exit('No direct script access allowed');
class data_hasil_m extends CI_Model
{
    private $data_hasil = "data_hasil";

    public function create($data)
    {
        $this->db->insert($this->data_hasil, $data);
        return $this->db->insert_id();
    }
}
