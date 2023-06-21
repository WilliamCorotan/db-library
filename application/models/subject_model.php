<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_model extends CI_Model
{
    /**
     * 
     * Inserts new subject entry in the database
     * @param object $data
     * 
     * @return int column_id
     * 
     */
    public function insert($data)
    {
        $this->db->insert('subject', array('name' => $data));
        return $this->db->insert_id();
    }

    /**
     * 
     * Retrieves specific subject based on id
     * @param int $id
     * 
     * @return object subject
     */
    public function get($id)
    {
        return $this->db->get_where('subject', array('id' => $id))->row_array();
    }

    /**
     * 
     * filters all subject based on input
     * @param string $input
     * 
     * @return object subject
     */
    public function filter($input)
    {
        $total = $this->db->select('*')
            ->from('subject')
            ->like('name', $input)
            ->get()
            ->result_array();
        return $total;
    }
}
