<?php

class View extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}


	public function single($id){
		// loads user and offer model
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

		// get offer information
		$this->load->model('offer/Get_offer_model', 'offer_model');
		$offer = $this->offer_model->getOfferByID($id);
		$dados = Array(
				'offer' => $offer[0]
			);
		
		// load offer view
		$this->load->view('opportunities/single', $dados);

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