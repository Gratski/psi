<?php
require_once ('InstitutionController.php');

class My extends InstitutionController
{

    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$this->load->model('institution/Main_model', 'vm');
    	$email = $this->session->user_details->email;
    	
    	$dadosProfile = $this->vm->getInstitutionByEmail($email);
        //echo "========================<br>";
        //echo var_dump($dadosProfile);
    	$dadosMenu = array(
    			'titulo' => 'Meu perfil',
    			'nome' => $dadosProfile->nome,
                'id' => $dadosProfile->id
    		);

    	$this->load->view('common/menu', $dadosMenu);
        $this->load->view('instituton/profile/header', $dadosProfile);
        $this->load->view('instituton/myprofile', $dadosProfile);
        $this->load->view('common/footer');
    }

}