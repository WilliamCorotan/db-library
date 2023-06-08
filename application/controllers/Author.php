<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{
    public function filter()
    {
        exit(json_encode($this->author_model->filter($this->input->get('input'))));
    }
}
