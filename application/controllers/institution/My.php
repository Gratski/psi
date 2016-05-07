<?php
require_once ('InstitutionController.php');

class My extends InstitutionController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	
        $this->load->view('institution/myprofile');
        $this->load->view('common/footer');
    }

}