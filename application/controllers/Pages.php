<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home | Tower of Honai';
        $this->load->view('partials/header', $data);
        $this->load->view('pages/index');
        $this->load->view('partials/footer');
    }
}
