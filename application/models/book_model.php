<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('book', $data);
    }

    public function get_all($limit = FALSE, $offset, $search = NULL)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($search == 'null') {
            return $this->db->select('book.id, book.title, book.description, book.cover_image, book.call_number, book.publish_date, author.name as author, subject.name as subject, publisher.name as publisher, borrow_status.code as borrow_status')
                ->from('book')
                ->join('author', 'book.author_id = author.id', 'left')
                ->join('subject', 'book.subject_id = subject.id', 'left')
                ->join('publisher', 'book.publisher_id = publisher.id', 'left')
                ->join('borrow_status', 'book.borrow_status_id = borrow_status.id', 'left')
                ->get()
                ->result_array();
        } else {
            return $this->db->select('book.id, book.title, book.description, book.cover_image, book.call_number, book.publish_date, author.name as author, subject.name as subject, publisher.name as publisher, borrow_status.code as borrow_status')
                ->from('book')
                ->join('author', 'book.author_id = author.id', 'left')
                ->join('subject', 'book.subject_id = subject.id', 'left')
                ->join('publisher', 'book.publisher_id = publisher.id', 'left')
                ->join('borrow_status', 'book.borrow_status_id = borrow_status.id', 'left')
                ->like('book.title', $search)
                ->or_like('book.description', $search)
                ->or_like('publisher.name', $search)
                ->or_like('author.name', $search)
                ->get()
                ->result_array();
        }
    }

    public function get($id)
    {
        return $this->db->select('book.id, book.title, book.description, book.cover_image, book.author_id, book.subject_id, book.call_number, book.publish_date, book.publisher_id, book.borrow_status_id, author.name as author, subject.name as subject, publisher.name as publisher, borrow_status.code as borrow_status')
            ->from('book')
            ->join('author', 'book.author_id = author.id', 'left')
            ->join('subject', 'book.subject_id = subject.id', 'left')
            ->join('publisher', 'book.publisher_id = publisher.id', 'left')
            ->join('borrow_status', 'book.borrow_status_id = borrow_status.id', 'left')
            ->where('book.id', $id)
            ->get()
            ->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('book', $data);
    }
    public function count()
    {
        return $this->db->count_all('book');
    }
}
