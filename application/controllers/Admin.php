<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'Dashboard | Tower of Honai';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/admin/index');
        $this->load->view('partials/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Please generate a password!'));

        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            $form_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status_id' => 1,
            );
            $this->admin_model->insert($form_data);
            exit(json_encode($this->input->post()));
        }
    }

    public function show($id)
    {
        $json_response['data'] = $this->admin_model->get($id);
        exit(json_encode($json_response));
    }

    public function update($id)
    {
        // Form validation Rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // Form Data 
        $form_data = array(
            'id' => $id,
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'status_id' => $this->input->post('status_id'),
        );

        if (!empty($this->input->post('password'))) {
            $form_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            // updates the user data in the database
            $this->admin_model->update($form_data);
            $json_response['message'] = 'Personal information successfully updated!';
            $json_response['data'] = $form_data;
            exit(json_encode($json_response));
        }
    }

    /**
     * Loads login page
     */
    public function show_login()
    {
        $data['title'] = 'Admin Login | Tower of Honai';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/admin/login');
        $this->load->view('partials/footer');
    }

    /**
     * Handles login logic
     */
    public function login()
    {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => 'Please provide a valid %s.'));

        // Checks if validation rules is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {

            // Data from the post stream
            $form_data = array(
                'email' => $this->input->post('email', TRUE),
                'password' => $this->input->post('password', TRUE)
            );

            // Verify and stores user credentials
            $authenticated_user = $this->admin_model->verify_credentials($form_data['email'], $form_data['password']);

            // Check if the a record is returned from the database
            if (!empty($authenticated_user)) {
                // Stores user data to session
                $this->session->set_userdata('user_id', $authenticated_user['id']);
                $this->session->set_userdata('is_logged_in', TRUE);
                $this->session->set_userdata('is_admin', TRUE);

                //Stores useful information to the Response Body
                $json_response['authenticated_user'] = $authenticated_user;
                $json_response['message'] = 'Logged in successfully!';
                $json_response['location'] = 'dashboard';
                exit(json_encode($json_response));
            }

            // Returns Response Body when Credentials not match
            $json_response['error_message'] = 'Invalid credentials, please try again!';
            exit(json_encode($json_response));
        }
    }

    public function show_admins()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'Admins | Tower of Honai';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/admin/user_admin');
        $this->load->view('partials/footer');
    }

    public function fetch_admins()
    {
        exit(json_encode($this->admin_model->get_all($this->session->userdata('user_id'))));
    }
}
