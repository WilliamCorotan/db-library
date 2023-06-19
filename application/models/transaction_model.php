<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('transaction', $data);
    }
}
