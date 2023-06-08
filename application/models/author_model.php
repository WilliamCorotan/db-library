<?php
defined('BASEPATH') or exit('No direct script access allowed');

class author_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('author', array('name' => $data));
        return $this->db->insert_id();
    }

    public function get($id)
    {
        return $this->db->get_where('author', array('id' => $id))->row_array();
    }


    public function filter($input)
    {
        return $this->db->select('*')
            ->from('author')
            ->like('name', $input)
            ->get()
            ->result_array();
    }
}
