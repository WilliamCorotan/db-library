<?php

class User_model extends CI_Model
{

    /**
     * Creates new record in the database 
     * @param string $data
     */
    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    /**
     * Verify the user credentials in the database
     * @param string $email
     * @param string $password
     * @return array user data | empty array
     */
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
