<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    /**
     * Loads login page
     */
    public function show_login()
    {
        $data['title'] = 'Login | Tower of Honai';
        $this->load->view('partials/header', $data);
        $this->load->view('pages/auth/login');
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
                $json_response['location'] = '/';
                exit(json_encode($json_response));
            }

            // Returns Response Body when Credentials not match
            $json_response['error_message'] = 'Invalid credentials, please try again!';
            exit(json_encode($json_response));
        }
    }

    /**
     * Loads register page
     */
    public function show_register()
    {
        $data['title'] = 'Register | Tower of Honai';
        $this->load->view('partials/header', $data);
        $this->load->view('pages/auth/register');
        $this->load->view('partials/footer');
    }

    /**
     * Handles register user logic
     */
    public function register()
    {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array('valid_email' => 'Please provide a valid %s.', 'is_unique' => 'This %s is already taken.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', array('matches' => 'The input provided didn\'t match the password.'));

        // Checks if validation rules is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            // Data from the post stream
            $form_data = array(
                'email' => $this->input->post('email', TRUE),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT)
            );

            // Tries to insert the data to the database
            try {
                $this->user_model->insert($form_data);

                // Returns the Response Body on insert success
                $json_response['message'] = 'Successfully registered user';
                $json_response['location'] = 'login';
                exit(json_encode($json_response));
            }
            // Returns the Response Body when an error 
            catch (\Exception $e) {
                $json_response['error_message'] = $e;
                exit(json_encode($json_response));
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('is_logged_in');
        $this->session->sess_destroy();

        redirect('/');
    }
}
