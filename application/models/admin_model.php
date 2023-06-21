<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    /**
     * 
     * Retrieves all admin from the database
     * @param int $id
     * @param int $limit
     * @param int $offset
     * @param string $search
     * 
     * @return array admins 
     * 
     */
    public function get_all($id, $limit = 10, $offset = 0, $search)
    {
        $this->db->limit($limit, $offset);
        $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
            ->join('status', 'status.id = admin.status_id', 'left');

        if ($search != 'null') {
            $this->db->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search);
        }
        return $this->db
            ->order_by('updated_at', 'DESC')
            ->get('admin')
            ->result_array();
    }

    /**
     * 
     * Retrieves specific admin data based on id
     * @param $id
     * 
     * @return object admin
     */
    public function get($id)
    {
        return $this->db->get_where('admin', array('id' => $id))->row_array();
    }

    /**
     * 
     * Inserts new admin entry to the database
     * @param array $data
     * 
     * @return boolean 
     */
    public function insert($data)
    {
        return $this->db->insert('admin', $data);
    }

    /**
     * 
     * Updates admin information of specific admin 
     * @param object $data
     * 
     * @return boolean
     * 
     */
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('admin', $data);
    }

    /**
     * 
     * Deletes admin based on id
     * @param int $id
     * 
     */
    public function delete($id)
    {
        $this->db->delete('admin', array('id' => $id));
    }

    /**
     * 
     * Counts total admins in the database
     * @param int $id
     * @param string $search
     *
     * @return object admins
     * 
     */
    public function count_record($id, $search)
    {

        $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
            ->from('admin')
            ->join('status', 'status.id = admin.status_id', 'left');

        if ($search != 'null') {
            $this->db->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search)
                ->not_like('admin.id', $id, 'none');
        }
        return $this->db->order_by('updated_at', 'DESC')
            ->get()
            ->result_array();
    }

    /**
     * 
     * Counts active admins in the database
     * 
     */
    public function count_active()
    {
        return $this->db->select('COUNT(admin.id) as count, status.code')
            ->from('admin')
            ->join('status', 'status.id = admin.status_id', 'left')
            ->group_by('admin.status_id')
            ->get()
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
            ->from('admin')
            ->where('email', $email)
            ->get();
        $result = $query->row_array();
        if (password_verify($password, $result['password'])) {
            return $result;
        }
        return [];
    }
}
