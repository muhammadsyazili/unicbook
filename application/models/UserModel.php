<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
    private $users = "users";
    private $levels = "levels";

    public function create($data)
    {
        $this->db->insert($this->users, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($this->users, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->users);
    }

    public function read($where = NULL, $limit = NULL)
    {
        $this->db->from($this->users);
        $this->db->join($this->levels, 'users.LEVEL_ID = levels.LEVEL_ID', 'left');

        if ($where != NULL) $this->db->where($where);
        if ($limit != NULL) $this->db->limit($limit, 0);

        return $this->db->get()->result();
    }

    public function readWhere($where)
    {
        $this->db->from($this->users);
        $this->db->join($this->levels, 'users.LEVEL_ID = levels.LEVEL_ID', 'left');

        $this->db->where($where);


        return $this->db->get()->row();
    }
}
