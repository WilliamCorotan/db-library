<?php
defined('BASEPATH') or exit('No direct script access allowed');

class publisher_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('publisher', array('name' => $data));
        return $this->db->insert_id();
    }

    public function get($id)
    {
        return $this->db->get_where('publisher', array('id' => $id))->row_array();
    }

    public function filter($input)
    {
        $total = $this->db->select('*')
            ->from('publisher')
            ->like('name', $input)
            ->get()
            ->result_array();
        return $total;
    }
}
