<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{
    public function filter()
    {
        exit(json_encode($this->subject_model->filter($this->input->get('input'))));
    }
}
