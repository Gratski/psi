<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:40
 */
class Welcome extends CI_Controller
{

    public function index(){
        $this->load->view('welcome/home');
    }

    public function afterLogin(){
        echo "yooo";
    }

}