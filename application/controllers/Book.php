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

    public function fetch($offset = 0)
    {
        $config['base_url'] = base_url('book/fetch');
        $config['per_page'] = 5;
        $config['total_rows'] = $this->book_model->count();
        $config['uri_segment'] = 3;
        $config['full_tag_open']    = '<nav id="book-pagination"><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['books'] = $this->book_model->get_all($config['per_page'], $offset);
        $data['config'] = $config;
        $response  = $this->load->view('components/books/book_table', $data);
        return $response;
    }
}
