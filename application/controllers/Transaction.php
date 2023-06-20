<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function index()
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $data['title'] = 'All Books';
        $this->load->view('partials/admin_header', $data);
        $this->load->view('pages/transaction/index');
        $this->load->view('partials/footer');
    }

    public function show($id)
    {
        $json_response['data'] = $this->transaction_model->get($id);
        $json_response['data']['borrow_date'] = (new DateTime($json_response['data']['borrow_date']))->format('Y-m-d');
        $json_response['data']['due_date'] = (new DateTime($json_response['data']['due_date']))->format('Y-m-d');
        exit(json_encode($json_response));
    }

    public function fetch($offset = 0)
    {
        if (empty($this->session->userdata('is_logged_in'))) {
            redirect('admin/login');
            exit();
        }
        $config['base_url'] = base_url('transaction/fetch');
        $config['per_page'] = 5;
        $config['total_rows'] = $this->transaction_model->count();
        $config['uri_segment'] = 3;
        $config['full_tag_open']    = '<nav id="transaction-pagination"><ul class="pagination d-flex justify-content-end">';
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
            $data['transactions'] = $this->transaction_model->get_all($config['per_page'], $offset, $this->input->get('search'));


            foreach ($data['transactions'] as &$transaction) {
                $borrow_date = (new DateTime($transaction['borrow_date']))->format('Y-m-d');
                $transaction['borrow_date'] = $borrow_date;
                $due_date = (new DateTime($transaction['due_date']))->format('Y-m-d');
                $transaction['due_date'] = $due_date;
            }
        } else {
            $data['transactions'] = $this->transaction_model->get_all($config['per_page'], $offset);

            foreach ($data['transactions'] as &$transaction) {
                $borrow_date = (new DateTime($transaction['borrow_date']))->format('Y-m-d');
                $transaction['borrow_date'] = $borrow_date;
                $due_date = (new DateTime($transaction['due_date']))->format('Y-m-d');
                $transaction['due_date'] = $due_date;
            }
        }

        $data['config'] = $config;
        $response  = $this->load->view('components/transaction/transaction_table', $data);
        return $response;
    }

    public function update_return_status($id)
    {
        $this->form_validation->set_rules('return_date', 'Return Date', 'required|callback_validate_return_date');

        if ($this->form_validation->run() === FALSE) {
            $json_response['form_errors'] = $this->form_validation->error_array();
            exit(json_encode($json_response));
        }

        $transaction_data = array(
            'book_id' => $this->input->post('book_id'),
        );
        if ($this->input->post('return_status_id') == 1) {
            $transaction_data['return_status_id'] = 2;
        } else {
            $transaction_data['return_status_id'] = 1;
        }

        $book_data = array();
        if ($this->input->post('borrow_status_id') == 1) {
            $book_data['borrow_status_id'] = 2;
        } else {
            $book_data['borrow_status_id'] = 1;
        }



        $this->transaction_model->update($id, $transaction_data);
        $this->book_model->update($this->input->post('book_id'), $book_data);
        $json_response['borrow_date'] = $this->input->post('borrow_date');
        $json_response['return_date'] = $this->input->post('return_date');
        exit(json_encode($json_response));
    }

    public function validate_return_date($return_date)
    {
        if ($return_date  < $this->input->post('borrow_date')) {
            $this->form_validation->set_message('validate_return_date', 'Invalid return date.');
            return FALSE;
        }

        return TRUE;
    }
}
