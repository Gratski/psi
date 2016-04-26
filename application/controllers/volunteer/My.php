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
    	$this->load->model('volunteers/Main_model', 'vm');
    	$email = $this->session->user_details->email;
    	
    	$dadosProfile = $this->vm->getVolunteerByEmail($email);
        //echo "========================<br>";
        //echo var_dump($dadosProfile);
    	$dadosMenu = array(
    			'titulo' => 'Meu perfil',
    			'nome' => $dadosProfile->nome,
                'id' => $dadosProfile->id,
                'foto' => $dadosProfile->foto
    		);

    	$this->load->view('common/menu', $dadosMenu);
        $this->load->view('volunteer/myprofile', $dadosProfile);
        $this->load->view('common/footer');
    }

}