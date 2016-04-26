<?php

class MY_Controller extends CI_Controller{


	public function __construct(){
		parent::__construct();

		//authenticate user session
		if(!$this->is_logged())
        	$this->redirectToRegist();
	}

	/**
	 * Verifica se um user esta logado
	 * @return true se estah logged, false caso contrario
	 */
	private function is_logged(){
	    $this->load->library('session');
	    $user_id = $this->session->userdata('user_id');
	    if(!isset($user_id)) {
	        return false;
	    }else{
	        return true;
	    }
	}

	/**
	 * Redireciona para formulario de registo
	 */
	private function redirectToRegist(){
	    redirect('signup');
	}

}

?>