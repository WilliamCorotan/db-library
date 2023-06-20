<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    /**
     * 
     * Displays specific user based on id
     * @param int $id
     */
    public function show($id)
    {
        $user = $this->user_model->get($id);
        exit(json_encode($user));
    }

    /**
     * Handles the request for updating the user's security information 
     */
    public function update_security($id)
    {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required');

        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {

            $form_data = array(
                'email' => $this->input->post('email'),
            );

            if (!empty($this->input->post('password'))) {
                $form_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }
            // Updates data in the database
            $this->user_model->update($id, $form_data);

            $json_response['message'] = 'Successfully updated user information!';
            exit(json_encode($json_response));
        }
    }

    /**
     * 
     * Counts all active admins
     * 
     */
    public function count_active_users()
    {
        exit(json_encode($this->user_model->count_active()));
    }
}
