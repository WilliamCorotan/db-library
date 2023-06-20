<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{
    /**
     * 
     * filters author based on provided input
     * 
     */
    public function filter()
    {
        exit(json_encode($this->author_model->filter($this->input->get('input'))));
    }
}
