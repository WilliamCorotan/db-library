<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function show($id)
    {
        $user = $this->user_model->get($id);
        exit(json_encode($user));
    }
}
