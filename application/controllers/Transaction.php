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
        $json_response['data']['return_date'] = (new DateTime($json_response['data']['return_date']))->format('Y-m-d');
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
                $return_date = (new DateTime($transaction['return_date']))->format('Y-m-d');
                $transaction['return_date'] = $return_date;
            }
        } else {
            $data['transactions'] = $this->transaction_model->get_all($config['per_page'], $offset);

            foreach ($data['transactions'] as &$transaction) {
                $borrow_date = (new DateTime($transaction['borrow_date']))->format('Y-m-d');
                $transaction['borrow_date'] = $borrow_date;
                $return_date = (new DateTime($transaction['return_date']))->format('Y-m-d');
                $transaction['return_date'] = $return_date;
            }
        }

        $data['config'] = $config;
        $response  = $this->load->view('components/transaction/transaction_table', $data);
        return $response;
    }
}
