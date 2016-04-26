<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 20:48
 */
class Login extends CI_Controller
{

    public function index(){
        $this->load->view('common/login');
    }

}