<?php
defined('BASEPATH') or exit('No direct script access allowed');
class data_buku_m extends CI_Model
{
    private $data_buku = "data_buku";

    public function create($data)
    {
        $this->db->insert($this->data_buku, $data);
        return $this->db->insert_id();
    }
    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->data_buku, $data);
    }
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->data_buku);
    }
    public function count($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->count_all_results($this->data_buku);
    }
    public function read($where = NULL, $limit = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);
        return $this->db->get($this->data_buku)->result();
    }
    public function readWhere($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->get($this->data_buku)->row();
    }
    public function getSearch($where, $status)
    {
        $status == 1 ? $this->db->like('JUDUL', $where, 'both') : $this->db->like('AUTHOR', $where, 'both');
        return $this->db->get($this->data_buku)->result();
    }
}
