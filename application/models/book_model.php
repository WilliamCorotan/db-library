<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('book', $data);
    }
    public function get_all($limit = FALSE, $offset)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->select('book.id, book.title, book.description, book.cover_image, book.call_number, book.publish_date, author.name as author, subject.name as subject, publisher.name as publisher, borrow_status.code as borrow_status')
            ->from('book')
            ->join('author', 'book.author_id = author.id', 'left')
            ->join('subject', 'book.subject_id = subject.id', 'left')
            ->join('publisher', 'book.publisher_id = publisher.id', 'left')
            ->join('borrow_status', 'book.borrow_status_id = borrow_status.id', 'left')
            ->get()
            ->result_array();
    }

    public function count()
    {
        return $this->db->count_all('book');
    }
}
