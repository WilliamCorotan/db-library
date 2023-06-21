<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    /**
     * 
     * Show books table page
     * 
     */
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

    /**
     * 
     * Handles books auto scroll pagination in user side
     *       
     */
    public function book_fetch()
    {

        $limit = 10;

        if (empty($this->input->get('page_number'))) {
            $page = 0;
        } else {
            $page = $this->input->get('page_number');
        }

        $offset = $page * $limit;
        $json_response['page'] = $page;
        $json_response['req'] = $this->input->get('page_number');
        $json_response['offset'] = $offset;
        $json_response['limit'] = $limit;
        $json_response['books'] = $this->book_model->get_all($limit, $offset);
        $json_response['total_books'] = $this->book_model->count();
        exit(json_encode($json_response));
    }


    /**
     * 
     * Shows specific book based on id
     * @param int $id
     * 
     */
    public function book_fetch_show($id)
    {
        $data['title'] = 'Home | Tower of Honai';
        $data['book'] = $this->book_model->get($id);
        $data['user'] = $this->user_model->get($this->session->userdata('user_id'));
        $this->load->view('partials/header', $data);
        $this->load->view('pages/user/collection/book/show', $data);
        $this->load->view('partials/footer');
    }

    /**
     * 
     * Shows Add book page
     * 
     */
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

    /**
     * 
     * Creates new book entry in the database
     * 
     */
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
            $json_response['message'] = 'Successfully added book!';
            $json_response['publisher'] = $publisher;
            $json_response['location'] = base_url('admin/books');
            exit(json_encode($json_response));
        }
    }

    /**
     * 
     * Fetches specific book based on id
     * @param int $id
     * 
     */
    public function show($id)
    {
        $json_response['data'] = $this->book_model->get($id);
        exit(json_encode($json_response));
    }

    /**
     * 
     * Handles book information update logic
     * 
     */
    public function update($id)
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        //file input configurations
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

        // Checks if the frm validation fails
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {

            //checks if there is an image file provided
            if ($this->upload->do_upload('cover_image')) {
                $form_data['cover_image'] = $this->upload->data('file_name');
            } else {
                $form_data['cover_image'] = $this->input->post('cover_image');
            }

            //Form data fields
            $form_data['title'] = $this->input->post('title');
            $form_data['description'] = $this->input->post('description');
            $form_data['call_number'] = $this->input->post('call_number');
            $form_data['publish_date'] = $this->input->post('publish_date');
            $form_data['borrow_status_id'] = $this->input->post('borrow_status');

            /**
             * 
             * Checks if the author exists
             * Creates new author entry if not and passes the id
             * Passes the id if the author exists
             * 
             */
            if (!empty($this->author_model->get($this->input->post('author')))) {
                $form_data['author_id'] = $this->input->post('author');
            } else {
                $author =  $this->author_model->insert($this->input->post('author'));
                $form_data['author_id'] = $author;
            }

            /**
             * 
             * Checks if the subject exists
             * Creates new subject entry if not and passes the id
             * Passes the id if the subject exists
             * 
             */
            if (!empty($this->subject_model->get($this->input->post('subject')))) {
                $form_data['subject_id'] = $this->input->post('subject');
            } else {
                $subject = $this->subject_model->insert($this->input->post('subject'));
                $form_data['subject_id'] = $subject;
            }

            /**
             * 
             * Checks if the publisher exists
             * Creates new publisher entry if not and passes the id
             * Passes the id if the publisher exists
             * 
             */
            if (!empty($this->publisher_model->get($this->input->post('publisher')))) {
                $form_data['publisher_id'] = $this->input->post('publisher');
            } else {
                $publisher = $this->publisher_model->insert($this->input->post('publisher'));
                $form_data['publisher_id'] = $publisher;
            }

            //creates new book entry
            $this->book_model->update($id, $form_data);
            $json_response['message'] = 'Successfully updated book information!';
            exit(json_encode($json_response));
        }
    }

    /**
     * 
     * Deletes book entry based on id
     * @param int $id
     * 
     */
    public function destroy($id)
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $this->book_model->delete($id);
        $json_response['message'] = 'Successfully Deleted Book Entry!';
        exit(json_encode($json_response));
    }

    /**
     * 
     * Handles book table pagination
     * @param int $offset 
     * 
     */
    public function fetch($offset = 0)
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }

        //pagination configuration
        $config['base_url'] = base_url('book/fetch');
        $config['per_page'] = 5;
        $config['total_rows'] = $this->book_model->count();
        $config['uri_segment'] = 3;
        $config['full_tag_open']    = '<nav id="book-pagination"><ul class="pagination d-flex justify-content-end">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_link'] = '&rsaquo;';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_link'] = '&laquo;';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_link'] = '&raquo;';
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

    /**
     * 
     * Handles borrow book logic
     * 
     */
    public function borrow()
    {
        if (empty($this->session->userdata('user_id'))) {
            exit(json_encode(array('login' => 'login')));
        }

        if (!$this->book_model->check_availability($this->input->post('book_id'))) {
            $json_response['availability'] = "Book is currently unavailable!";
            exit(json_encode($json_response));
        }

        // Form validations
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|is_unique[user.contact_number]|regex_match[/^(09|\+639)\d{9}$/]', array('regex_match' => 'Provide a contact number with format: 09xxxxxxxxx or +639xxxxxxxxx'));
        $this->form_validation->set_rules('street', 'Street', 'required');
        $this->form_validation->set_rules('barangay', 'Barangay', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
        $this->form_validation->set_rules('borrow_date', 'Borrow Date', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        // Check if the form validation fails
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            $json_response['form_data']   = array(
                'user_id' => $this->input->post('user_id'),
                'book_id' => $this->input->post('book_id'),
                'borrow_date' => $this->input->post('borrow_date'),
                'due_date' => $this->input->post('due_date'),

            );

            exit(json_encode($json_response));
        }

        // Transaction data fields
        $transaction_data = array(
            'user_id' => $this->input->post('user_id'),
            'book_id' => $this->input->post('book_id'),
            'borrow_date' => $this->input->post('borrow_date'),
            'due_date' => $this->input->post('due_date'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_number' => $this->input->post('contact_number'),
            'street' => $this->input->post('street'),
            'barangay' => $this->input->post('barangay'),
            'city' => $this->input->post('city'),
            'province' => $this->input->post('province'),
            'zip_code' => $this->input->post('zip_code'),
        );

        //Prompts the frontend if the user saves their information for the first time
        if (!empty($this->input->post('user_data'))) {
            $json_response['first_save'] = TRUE;
            $json_response['message'] = 'Want to save your information for future transaction?';
            exit(json_encode($json_response));
        }

        // Saves user information if agrees
        if (!empty($this->input->post('save'))) {

            // User data
            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'contact_number' => $this->input->post('contact_number'),
            );

            $this->user_model->update($this->input->post('user_id'), $user_data);

            // User address data
            $address_data = array(
                'id' => '',
                'street' => $this->input->post('street'),
                'barangay' => $this->input->post('barangay'),
                'city' => $this->input->post('city'),
                'province' => $this->input->post('province'),
                'zip_code' => $this->input->post('zip_code'),
                'user_id' => $this->session->userdata('user_id')
            );

            $this->user_model->update_address($address_data);
        }

        $this->transaction_model->insert($transaction_data);
        $this->book_model->update($this->input->post('book_id'), array('borrow_status_id' => 2));
        $json_response['message'] = 'Successfully borrowed book!';
        $json_response['reload'] = TRUE;
        exit(json_encode($json_response));
    }

    /**
     * 
     * Counts books per subject
     * 
     */
    public function count_books_by_subject()
    {
        exit(json_encode($this->book_model->count_subjects()));
    }

    /**
     * 
     * Counts books per author
     * 
     */
    public function count_books_by_author()
    {
        exit(json_encode($this->book_model->count_authors()));
    }

    /**
     * 
     * Count books per publisher
     * 
     */
    public function count_books_by_publisher()
    {
        exit(json_encode($this->book_model->count_publishers()));
    }
}
