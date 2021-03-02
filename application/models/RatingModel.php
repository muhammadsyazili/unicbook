<?php
defined('BASEPATH') or exit('No direct script access allowed');
class RatingModel extends CI_Model
{
    //tabel utama
    private $rates = "rates";

    //tabel dipendensi
    private $books = "books";
    private $users = "users";

    public function create($data)
    {
        $this->db->insert($this->rates, $data);
        return $this->db->insert_id();
    }
    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->rates, $data);
    }
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->rates);
    }
    public function count($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->count_all_results($this->rates);
    }
    public function read($where = NULL, $limit = NULL)
    {
        $this->db->select('*');
        $this->db->from($this->rates);
        $this->db->join($this->users, 'users.USER_ID = rates.USER_ID');
        $this->db->join($this->books, 'books.BOOK_ID = rates.BOOK_ID');

        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);

        return $this->db->get()->result();
    }
    public function readWhere($where = NULL)
    {
        $this->db->select('*');
        $this->db->from($this->rates);
        $this->db->join($this->users, 'users.USER_ID = rates.USER_ID');
        $this->db->join($this->books, 'books.BOOK_ID = rates.BOOK_ID');

        if ($where != NULL) $this->db->where($where);

        return $this->db->get()->row();
    }
}
