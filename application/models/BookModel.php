<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BookModel extends CI_Model
{
    private $books = "books";

    public function create($data)
    {
        $this->db->insert($this->books, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->books, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->books);
    }

    public function count($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->count_all_results($this->books);
    }

    public function read($where = NULL, $limit = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);
        return $this->db->get($this->books)->result();
    }

    public function readWhere($where = NULL)
    {
        if ($where != NULL) $this->db->where($where);
        return $this->db->get($this->books)->row();
    }
}
