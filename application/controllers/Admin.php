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
            $json_response['message'] = 'Successfully added admin!';
            exit(json_encode($json_response));
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
            $json_response['message'] = 'Successfully updated admin information!';
            exit(json_encode($json_response));
        }
    }

    public function destroy($id)
    {
        $this->admin_model->delete($id);
        $json_response['message'] = "Successfully Deleted Admin!";
        exit(json_encode($json_response));
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
                $this->session->set_userdata('user_email', $authenticated_user['email']);
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

    public function show_profile()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'Profile Settings | Tower of Honai';
        $data['userdata'] = $this->admin_model->get($this->session->userdata('user_id'));

        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/profile/admin');
        $this->load->view('partials/footer');
    }

    public function update_user()
    {
        // Form Validation Rules
        $this->form_validation->set_rules('first_name', "First Name", 'required');
        $this->form_validation->set_rules('last_name', "Last Name", 'required');
        $this->form_validation->set_rules('email', "Email", 'required');
        $this->form_validation->set_rules('current_password', "Password", 'required|callback_validate_password');

        // Form Validation Rules for new password and confirm password
        if (!empty($this->input->post('new_password')) || !empty($this->input->post('confirm_password'))) {
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|max_length[255]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[new_password]');
        }

        // Checks if form validation is not met
        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        } else {
            // Form Data 
            $form_data = array(
                'id' => $this->input->post('id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
            );

            // Check if a new password is entered
            if (!empty($this->input->post('new_password'))) {
                $form_data['password'] = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);
            }
            // updates the user data in the database
            $this->admin_model->update($form_data);
            $this->session->unset_userdata('user_email');
            $this->session->set_userdata('user_email', $this->input->post('email'));
            $json_response['message'] = 'Personal information successfully updated!';
            $json_response['data'] = $form_data;
            $json_response['session'] = $this->session->userdata();
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

    public function show_users()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'Users | Tower of Honai';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/admin/user_user');
        $this->load->view('partials/footer');
    }

    public function fetch_admins($page = 1, $search = NULL)
    {
        $config['base_url'] = base_url('admin/users/admins');
        $config['per_page'] = 10;
        $config['total_rows'] = count($this->admin_model->count_record($this->session->userdata('user_id'), $search));
        $config['uri_segment'] = 4;

        if ($page == 1 || $page == NULL) {

            $current_offset = 0;
        } else {
            $current_offset = $config['per_page'] * ($page - 1);
        }


        // Checker for negative page number
        if ($page == 1) {
            $prev_page = null;
        } else {
            $prev_page = $page - 1;
        }

        // Checker for exceeding page number
        if (($page) >=  ceil($config['total_rows'] / $config['per_page'])) {
            $next_page = null;
        } else {
            $next_page = $page + 1;
        }

        $this->pagination->initialize($config);

        // $page = (($this->uri->segment(4)) ? $this->uri->segment(4) : 0);
        $json_response['data'] = $this->admin_model->get_all($this->session->userdata('user_id'), $config['per_page'], $current_offset, $search);
        $json_response['total_rows'] = $config['total_rows'];
        $json_response['current_page'] = (int)$page;
        $json_response['first_page'] = 1;
        $json_response['last_page'] = ceil($config['total_rows'] / $config['per_page']);
        $json_response['prev_page'] = $prev_page;
        $json_response['next_page'] = $next_page;
        $json_response['total_pages'] = ceil($config['total_rows'] / $config['per_page']);
        $json_response['current_offset'] = $current_offset;
        $json_response['search'] = $search;
        exit(json_encode($json_response));
    }

    public function fetch_users($page = 1, $search = NULL)
    {
        $config['base_url'] = base_url('admin/users/users');
        $config['per_page'] = 10;
        $config['total_rows'] = count($this->user_model->count_record($search));
        $config['uri_segment'] = 4;

        if ($page == 1 || $page == NULL) {

            $current_offset = 0;
        } else {
            $current_offset = $config['per_page'] * ($page - 1);
        }


        // Checker for negative page number
        if ($page == 1) {
            $prev_page = null;
        } else {
            $prev_page = $page - 1;
        }

        // Checker for exceeding page number
        if (($page) >=  ceil($config['total_rows'] / $config['per_page'])) {
            $next_page = null;
        } else {
            $next_page = $page + 1;
        }

        $this->pagination->initialize($config);

        // $page = (($this->uri->segment(4)) ? $this->uri->segment(4) : 0);
        $json_response['data'] = $this->user_model->get_all($config['per_page'], $current_offset, $search);
        $json_response['total_rows'] = $config['total_rows'];
        $json_response['current_page'] = (int)$page;
        $json_response['first_page'] = 1;
        $json_response['last_page'] = ceil($config['total_rows'] / $config['per_page']);
        $json_response['prev_page'] = $prev_page;
        $json_response['next_page'] = $next_page;
        $json_response['total_pages'] = ceil($config['total_rows'] / $config['per_page']);
        $json_response['current_offset'] = $current_offset;
        $json_response['search'] = $search;
        exit(json_encode($json_response));
    }

    public function count_active_admins()
    {
        exit(json_encode($this->admin_model->count_active()));
    }
    /**
     * Custom validation rule for checking if the passed password matches the database 
     */
    public function validate_password()
    {
        $validated_credentials = $this->admin_model->verify_credentials($this->session->userdata('user_email'), $this->input->post('current_password'));
        $this->form_validation->set_message('validate_password', 'Incorrect password!');
        // Check if the a record is returned from the database
        if (!empty($validated_credentials)) {
            return TRUE;
        }

        return FALSE;
    }
}
