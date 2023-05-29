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
        exit('login');
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
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[user.email]',
            array(
                'valid_email' => 'Please provide a valid %s.',
                'is_unique' => 'This %s is already taken.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules(
            'confirm_password',
            'Confirm Password',
            'required|matches[password]',
            array(
                'matches' => 'The input provided didn\'t match the password.'
            )
        );

        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            $form_data = array(
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            );
            try {
                $this->user_model->insert($form_data);
                $json_response['message'] = 'Successfully registered user';
                $json_response['location'] = 'login';
                exit(json_encode($json_response));
            } catch (\Exception $e) {
                $json_response['error_message'] = $e;
                exit(json_encode($json_response));
            }
        }
    }
}
