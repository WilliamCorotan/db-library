<?php
defined('BASEPATH') or exit('No direct script access allowed');

class publisher_model extends CI_Model
{
    /**
     * 
     * Inserts new publisher entry in the database
     * @param object $data
     * 
     * @return int column_id
     * 
     */
    public function insert($data)
    {
        $publisher = $this->db->get_where('publisher', array('name' => $data))->row_array();

        if (!empty($publisher)) {
            return $publisher['id'];
        }

        $this->db->insert('publisher', array('name' => $data));
        return $this->db->insert_id();
    }

    /**
     * 
     * Retrieves specific publisher based on id
     * @param int $id
     * 
     * @return object publisher
     */
    public function get($id)
    {
        return $this->db->get_where('publisher', array('id' => $id))->row_array();
    }

    /**
     * 
     * filters all publisher based on input
     * @param string $input
     * 
     * @return object publisher
     */
    public function filter($input)
    {
        $total = $this->db->select('*')
            ->from('publisher')
            ->like('name', $input)
            ->get()
            ->result_array();
        return $total;
    }
}
