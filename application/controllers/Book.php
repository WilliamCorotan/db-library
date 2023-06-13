<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function index()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'All Books';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/books/index');
        $this->load->view('partials/footer');
    }

    public function create()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'Add Book';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/books/add');
        $this->load->view('partials/footer');
    }

    public function store()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('call_number', 'Call Number', 'required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
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
    }

    public function show($id)
    {
        $json_response['data'] = $this->book_model->get($id);
        exit(json_encode($json_response));
    }

    public function update($id)
    {
        $config['upload_path'] = './assets/images/books/';
        $config['allowed_types'] = 'gif|jpg|png|webp';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5120';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('call_number', 'Call Number', 'required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            if ($this->upload->do_upload('cover_image')) {
                $form_data['cover_image'] = $this->upload->data('file_name');
            } else {
                $form_data['cover_image'] = $this->input->post('cover_image');
            }

            $form_data['title'] = $this->input->post('title');
            $form_data['description'] = $this->input->post('description');
            $form_data['call_number'] = $this->input->post('call_number');
            $form_data['publish_date'] = $this->input->post('publish_date');
            $form_data['borrow_status_id'] = $this->input->post('borrow_status');

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

            $this->book_model->update($id, $form_data);

            exit(json_encode($form_data));
        }
    }

    public function destroy($id)
    {
        $this->book_model->delete($id);
        $json_response['message'] = 'Successfully Deleted Book Entry!';
        exit(json_encode($json_response));
    }

    public function fetch($offset = 0)
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
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

        $search = $this->input->get('search');
        if (null !== $search) {
            $data['books'] = $this->book_model->get_all($config['per_page'], $offset, $this->input->get('search'));
        } else {
            $data['books'] = $this->book_model->get_all($config['per_page'], $offset);
        }

        $data['config'] = $config;
        $response  = $this->load->view('components/books/book_table', $data);
        return $response;
    }

    public function count_books_by_subject()
    {
        exit(json_encode($this->book_model->count_subjects()));
    }
    public function count_books_by_author()
    {
        exit(json_encode($this->book_model->count_authors()));
    }
    public function count_books_by_publisher()
    {
        exit(json_encode($this->book_model->count_publishers()));
    }
}
