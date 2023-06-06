<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_all($id, $limit = 10, $offset = 0)
    {
        return $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
            ->from('admin')
            ->join('status', 'status.id = admin.status_id', 'left')
            ->where('admin.id !=', $id)
            ->limit($limit, $offset)
            ->order_by('updated_at', 'DESC')
            ->get()
            ->result_array();
    }

    public function get($id)
    {
        return $this->db->get_where('admin', array('id' => $id))->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('admin', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('admin', $data);
    }

    public function count_record()
    {
        return $this->db->count_all('admin');
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
