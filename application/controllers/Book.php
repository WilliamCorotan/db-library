<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'All Books';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/books/index');
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $data['title'] = 'Add Book';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/books/add');
        $this->load->view('partials/footer');
    }

    public function store()
    {
        $config['upload_path'] = './assets/images/books/';
        $config['allowed_types'] = 'gif|jpg|png|webp';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5120';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $form_data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'subject_id' => $this->input->post('subject'),
            'call_number' => $this->input->post('call_number'),
            'publish_date' => $this->input->post('publish_date'),
            'publisher_id' => $this->input->post('publisher'),
            'borrow_status_id' => 1
        );

        if ($this->upload->do_upload('cover_image')) {

            $form_data['cover_image'] = $this->upload->data('file_name');
        } else {
            $form_data['cover_image'] = '01-no-cover.jpg';
        }

        if (!empty($this->author_model->get($this->input->post('author')))) {
            $form_data['author_id'] = $this->input->post('author');
        } else {
            $author =  $this->author_model->insert($this->input->post('author'));
            $form_data['author_id'] = $author;
        }


        if (!empty($this->subject_model->get($this->input->post('subject')))) {
            $form_data['subject_id'] = $this->input->post('subject');
        } else {
            $subject = $this->subject_model->insert($this->input->post('subject'));
            $form_data['subject_id'] = $subject;
        }


        if (!empty($this->publisher_model->get($this->input->post('publisher')))) {
            $form_data['publisher_id'] = $this->input->post('publisher');
        } else {
            $publisher = $this->publisher_model->insert($this->input->post('publisher'));
            $form_data['publisher_id'] = $publisher;
        }

        $this->book_model->insert($form_data);
        $json_response['location'] = base_url('admin/books');
        exit(json_encode($json_response));
    }

    public function fetch()
    {
        $response  = $this->load->view('components/books/book_table');
        return $response;
    }
}
