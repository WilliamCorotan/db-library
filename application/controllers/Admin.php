<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard | Tower of Honai';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/admin/index');
        $this->load->view('partials/footer');
    }

    /**
     * Loads login page
     */
    public function show_login()
    {
        $data['title'] = 'Admin Login | Tower of Honai';
        $this->load->view('partials/header', $data);
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
            $authenticated_user = $this->user_model->verify_credentials($form_data['email'], $form_data['password']);

            // Check if the a record is returned from the database
            if (!empty($authenticated_user)) {
                // Stores user data to session
                $this->session->set_userdata('user_id', $authenticated_user['id']);
                $this->session->set_userdata('is_logged_in', TRUE);

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
}
