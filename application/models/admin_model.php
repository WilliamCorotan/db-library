<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_all($id, $limit = 10, $offset = 0, $search)
    {
        if ($search == 'null') {
            return $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
                ->from('admin')
                ->join('status', 'status.id = admin.status_id', 'left')
                ->where('admin.id !=', $id)
                ->limit($limit, $offset)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        } else {
            return $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
                ->from('admin')
                ->join('status', 'status.id = admin.status_id', 'left')
                ->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search)
                ->not_like('admin.id', $id, 'none')
                ->limit($limit, $offset)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        }
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

    public function delete($id)
    {
        $this->db->delete('admin', array('id' => $id));
    }

    public function count_record($id, $search)
    {
        if ($search == 'null') {
            $total =  $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
                ->from('admin')
                ->join('status', 'status.id = admin.status_id', 'left')
                ->where('admin.id !=', $id)
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        } else {
            $total = $this->db->select('admin.id, admin.first_name, admin.last_name, email, status.code AS status')
                ->from('admin')
                ->join('status', 'status.id = admin.status_id', 'left')
                ->like('first_name', $search)
                ->or_like('last_name', $search)
                ->or_like('email', $search)
                ->not_like('admin.id', $id, 'none')
                ->order_by('updated_at', 'DESC')
                ->get()
                ->result_array();
        }

        return $total;
    }

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
