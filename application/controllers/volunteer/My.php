<?php
require_once ('VoluntarioController.php');
/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 19:46
 */
class My extends VoluntarioController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = $this->session->user_details;
        $this->load->view('volunteer/myprofile', $data);
    }

}