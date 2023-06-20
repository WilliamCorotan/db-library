<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('transaction', $data);
    }

    public function get($id)
    {
        return $this->db->select('book.id as book_id, return_status.code as return_status, book.title as book_title, transaction.id as id, transaction.borrow_date, transaction.due_date, transaction.first_name, transaction.last_name, transaction.contact_number')
            ->join('book', 'book.id = transaction.book_id', 'left')
            ->join('return_status', 'transaction.return_status_id = return_status.id', 'left')
            ->where('transaction.id', $id)
            ->get('transaction')
            ->row_array();
    }

    public function count()
    {
        return $this->db->count_all('transaction');
    }

    public function get_all($limit = FALSE, $offset = 0, $search = NULL)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $this->db->select('book.id as book_id, return_status.code as return_status, book.title as book_title, transaction.id as id, transaction.borrow_date, transaction.due_date, transaction.first_name, transaction.last_name, transaction.contact_number')
            ->join('book', 'book.id = transaction.book_id', 'left')
            ->join('return_status', 'transaction.return_status_id = return_status.id', 'left');

        if ($search != 'null') {
            $this->db->like('book.title', $search)
                ->or_like('transaction.first_name', $search)
                ->or_like('transaction.last_name', $search);
        }

        $this->db->order_by('id', 'DESC');
        return $this->db->get('transaction')
            ->result_array();
    }
}
