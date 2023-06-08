<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher extends CI_Controller
{
    public function filter()
    {
        exit(json_encode($this->publisher_model->filter($this->input->get('input'))));
    }
}
