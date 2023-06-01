<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
            ->from('admin')
            ->join('status', 'status.id = admin.status_id', 'left')
            ->get()
            ->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('admin', $data);
    }
}
