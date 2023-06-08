<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('book', $data);
    }
}
