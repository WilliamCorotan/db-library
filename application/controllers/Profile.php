<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    /**
     * Shows Profile page
     */
    public function index()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect('login');
            exit();
        }
        $data['title'] = 'Profile Settings | Tower of Honai';
        $data['userdata'] = $this->user_model->get($this->session->userdata('user_id'));

        $this->load->view('partials/header', $data);
        $this->load->view('pages/profile/index');
        $this->load->view('partials/footer');
    }

    /**
     * Handles the request for updating the user's personal information
     */
    public function update_user()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect('login');
            exit();
        }
        // Form validation Rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|is_unique[user.contact_number]|regex_match[/^(09|\+639)\d{9}$/]', array('regex_match' => 'Provide a contact number with format: 09xxxxxxxxx or +639xxxxxxxxx'));

        // Form Data 
        $form_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_number' => $this->input->post('contact_number'),
        );


        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            // updates the user data in the database
            $this->user_model->update($this->session->userdata('user_id'), $form_data);
            $this->session->set_userdata('first_name', $form_data['first_name']);
            $json_response['message'] = 'Personal information successfully updated!';
            exit(json_encode($json_response));
        }
    }

    /**
     * Handles the request for updating the user's address information
     */
    public function update_address()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect('login');
            exit();
        }

        // Form validation rules
        $this->form_validation->set_rules('street', 'Street', 'required');
        $this->form_validation->set_rules('barangay', 'Barangay', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');

        // Form data
        $form_data = array(
            'id' => $this->input->post('address_id'),
            'street' => $this->input->post('street'),
            'barangay' => $this->input->post('barangay'),
            'city' => $this->input->post('city'),
            'province' => $this->input->post('province'),
            'zip_code' => $this->input->post('zip_code'),
            'user_id' => $this->session->userdata('user_id')
        );

        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            // Updates user's address data in the database
            $this->user_model->update_address($form_data);
            $json_response['message'] = 'Address information successfully updated!';
            exit(json_encode($json_response));
        }
    }

    /**
     * Handles the request for updating the user's security information 
     */
    public function update_security()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect('login');
            exit();
        }

        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_validate_password');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[8]|max_length[255]|matches[new_password]');

        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {

            $data = array(
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('new_password'), PASSWORD_BCRYPT),

            );
            // Updates data in the database
            $this->user_model->update($this->session->userdata('user_id'), $data);

            $json_response['message'] = 'Security information successfully updated!';
            exit(json_encode($json_response));
        }
    }

    /**
     * Custom validation rule for checking if the passed password matches the database 
     */
    public function validate_password()
    {
        $validated_credentials = $this->user_model->verify_credentials($this->input->post('email'), $this->input->post('current_password'));
        $this->form_validation->set_message('validate_password', 'Incorrect password!');
        // Check if the a record is returned from the database
        if (!empty($validated_credentials)) {
            return TRUE;
        }

        return FALSE;
    }
}
