<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_user_m extends CI_Model
{
    private $data_user = "data_user";
    private $data_level = "data_level";

    public function create($data)
    {
        $this->db->insert($this->data_user, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->data_user, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->data_user);
    }

    public function read($where = NULL, $limit = NULL)
    {
        $this->db->from($this->data_user);
        $this->db->join($this->data_level, 'data_user.LEVEL = data_level.LEVEL_ID', 'left');

        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);

        return $this->db->get()->result();
    }

    public function readWhere($where)
    {
        $this->db->from($this->data_user);
        $this->db->join($this->data_level, 'data_user.LEVEL = data_level.LEVEL_ID', 'left');

        $this->db->where($where);


        return $this->db->get()->row();
    }
}
