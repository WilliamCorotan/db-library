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

    public function verify_credentials($email, $password)
    {
        $query = $this->db->select('*')
            ->from('user')
            ->where('email', $email)
            ->get();
        $result = $query->row_array();
        if (password_verify($password, $result['password'])) {
            return $result;
        }
        return [];
    }
}
