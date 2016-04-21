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
    	$this->load->model('users/User_model', 'um');
    	$email = $this->session->user_details->email;
    	
    	$dadosProfile = $this->um->getUserByEmail($email);
    	$dadosMenu = array(
    			'titulo' => 'Meu perfil',
    			'username' => $dadosProfile->nome
    		);

    	$this->load->view('common/menu', $dadosMenu);
        $this->load->view('volunteer/myprofile', $dadosProfile);
        $this->load->view('common/footer');
    }

}