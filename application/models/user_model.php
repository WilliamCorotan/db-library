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


    public function get_all($limit = 10, $offset = 0, $search)
    {
        if ($search == 'null') {
            return $this->db->select('user.id, user.first_name, user.last_name, email, user_address.id as address_id, user_address.street, user_address.barangay, user_address.city, user_address.province, user_address.zip_code')
                ->from('user')
                ->join('user_address', 'user_address.user_id = user.id', 'left')
                ->limit($limit, $offset)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        } else {
            return $this->db->select('user.id, user.first_name, user.last_name, email, user_address.id as address_id, user_address.street, user_address.barangay, user_address.city, user_address.province, user_address.zip_code')
                ->from('user')
                ->join('user_address', 'user_address.user_id = user.id', 'left')
                ->like('user.first_name', $search)
                ->or_like('user.last_name', $search)
                ->or_like('user.email', $search)
                ->limit($limit, $offset)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        }
    }


    /**
     * Fetches specific data of a user in the database based on ID
     * @param int $id
     * @return array user data 
     */
    public function get($id)
    {
        $query = $this->db->select('user.id, user.first_name, user.last_name, user.contact_number, user.email, user.password, user_address.id as address_id, user_address.street, user_address.barangay, user_address.city, user_address.province, user_address.zip_code')
            ->from('user')
            ->join('user_address', 'user_address.user_id = user.id', 'left')
            ->where('user.id', $id)
            ->get();
        return $query->row_array();
    }

    /**
     * Updates the user's information in the database
     * @param int $id
     * @param array $data
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    /**
     * Updates the user's address information in the database
     * @param array $data
     */
    public function update_address($data)
    {
        // fetches the users address data in the database
        $this->db->where('id', $data['id']);
        $q = $this->db->get('user_address');

        //Does an update statement if data exist
        if ($q->num_rows() > 0) {
            $this->db->where('id', $data['id']);
            return $this->db->update('user_address', $data);
        }
        // Does an insert statement if data do not exist
        else {
            return $this->db->insert('user_address', $data);
        }
    }

    public function count_record($search)
    {
        if ($search == 'null') {
            $total = $this->db->select('*')
                ->from('user')
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        } else {
            $total = $this->db->select('*')
                ->from('user')
                ->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        }

        return $total;
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
