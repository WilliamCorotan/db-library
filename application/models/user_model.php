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
        $this->db->limit($limit, $offset);
        $this->db->select('user.id, user.first_name, user.last_name, email, user_address.id as address_id, user_address.street, user_address.barangay, user_address.city, user_address.province, user_address.zip_code')
            ->join('user_address', 'user_address.user_id = user.id', 'left');
        if ($search != 'null') {
            $this->db
                ->like('user.first_name', $search)
                ->or_like('user.last_name', $search)
                ->or_like('user.email', $search);
        }
        return
            $this->db->order_by('updated_at', 'DESC')
            ->get('user')
            ->result_array();
    }


    /**
     * Fetches specific data of a user in the database based on ID
     * @param int $id
     * @return array user data 
     */
    public function get($id)
    {
        $query = $this->db->select('user.id, user.first_name, user.last_name, user.contact_number, user.email, user.password, user_address.id as address_id, user_address.street, user_address.barangay, user_address.city, user_address.province, user_address.zip_code')
            ->join('user_address', 'user_address.user_id = user.id', 'left')
            ->where('user.id', $id)
            ->get('user');
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
        $this->db->select('*');
        if ($search != 'null') {
            $this->db->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search);
        }
        return $this->db->order_by('updated_at', 'DESC')
            ->get('user')
            ->result_array();
    }

    public function count_active()
    {
        return $this->db->select('COUNT(user.id) as count, status.code')
            ->join('status', 'status.id = user.status_id', 'left')
            ->group_by('user.status_id')
            ->get('user')
            ->result_array();
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
            ->where('email', $email)
            ->get('user');
        $result = $query->row_array();
        if (password_verify($password, $result['password'])) {
            return $result;
        }
        return [];
    }
}
