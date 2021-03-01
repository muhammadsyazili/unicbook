<?php
defined('BASEPATH') or exit('No direct script access allowed');
class data_rating_m extends CI_Model
{
    //tabel utama
    private $data_rating = "data_rating";

    //tabel dipendensi
    private $data_buku = "data_buku";
    private $data_user = "data_user";

    public function create($data)
    {
        $this->db->insert($this->data_rating, $data);
        return $this->db->insert_id();
    }
    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->data_rating, $data);
    }
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->data_rating);
    }
    public function count($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->count_all_results($this->data_rating);
    }
    public function read($where = NULL, $limit = NULL)
    {
        $this->db->select('*');
        $this->db->from($this->data_rating);
        $this->db->join($this->data_user, 'data_user.USER_ID = data_rating.USER_ID');
        $this->db->join($this->data_buku, 'data_buku.ISBN = data_rating.ISBN');

        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);

        return $this->db->get()->result();
    }
    public function readWhere($where = NULL)
    {
        $this->db->select('*');
        $this->db->from($this->data_rating);
        $this->db->join($this->data_user, 'data_user.USER_ID = data_rating.USER_ID');
        $this->db->join($this->data_buku, 'data_buku.ISBN = data_rating.ISBN');

        if ($where != NULL) $this->db->where($where);

        return $this->db->get()->row();
    }
}
