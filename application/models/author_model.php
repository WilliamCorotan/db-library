<?php
defined('BASEPATH') or exit('No direct script access allowed');

class author_model extends CI_Model
{
    /**
     * 
     * Inserts new author entry in the database
     * @param object $data
     * 
     * @return int column_id
     * 
     */
    public function insert($data)
    {
        $author = $this->db->get_where('author', array('name' => $data))->row_array();

        if (!empty($author)) {
            return $author['id'];
        }

        $this->db->insert('author', array('name' => $data));
        return $this->db->insert_id();
    }

    /**
     * 
     * Retrieves specific author based on id
     * @param int $id
     * 
     * @return object author
     */
    public function get($id)
    {
        return $this->db->get_where('author', array('id' => $id))->row_array();
    }

    /**
     * 
     * filters all author based on input
     * @param string $input
     * 
     * @return object author
     */
    public function filter($input)
    {
        return $this->db->select('*')
            ->from('author')
            ->like('name', $input)
            ->get()
            ->result_array();
    }
}
