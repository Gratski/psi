<?php

class View extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}


	public function single($id){

		// loads user model
		$this->load->model('users/User_model', 'user_model');

		// prepare menu adta
		$dadosMenu = array(
    			'titulo' => 'Oportunidade',
    			'nome' => $this->session->user_details->nome,
                'id' => $this->session->user_details->id
    		);

		// load user type menu
		if($this->isInstitution())
			$this->load->view('institution/menu', $dadosMenu);
		else
			$this->load->view('common/menu',$dadosMenu);

	}



	/**
	*	Checks if a user is an institution or not
	**/
	private function isInstitution(){

		// get session user id
		$user_id = $this->session->user_details->id;

		// if this user is an institution
		return $this->user_model->isInstitution($user_id);

	}

}


?>