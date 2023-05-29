<?php

class User_model extends CI_Model
{

    /**
     * Creates new record in the database 
     */
    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }
}
