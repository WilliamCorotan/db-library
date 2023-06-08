<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('subject', array('name' => $data));
        return $this->db->insert_id();
    }

    public function get($id)
    {
        return $this->db->get_where('subject', array('id' => $id))->row_array();
    }

    public function filter($input)
    {
        $total = $this->db->select('*')
            ->from('subject')
            ->like('name', $input)
            ->get()
            ->result_array();
        return $total;
    }
}
