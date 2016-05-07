<?php

require_once('InstitutionController.php');


class Offer extends InstitutionController {
	
	
	/**
     * Offer constructor.
     */
    public function __construct() {
        parent::__construct();
    }
	
	 public function add_Offer() {
		
		//prepara horario para criar
		$horario = array(
            'hora_inicio' => $_POST['hora_inicio'],
            'hora_fim' => $_POST['hora_fim'],
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim']
        );
		
		$this->load->model('schedule/schedule_model', 'newSch');
		
		//cria um novo horario
		$insertedID = this->newSch->create($horario);
		
		//prepara oportunidade
		$user_id = $this->session->user_id;
		
		$offer = array(
            'instituicao' => $user_id,
            'areas_grupo' => $_POST['areas_grupo'],
            'freguesia' => $_POST['freguesia'],
            'vagas' => $_POST['vagas'],
			'descricao' => $_POST['descricao'],
			'funcao' => $_POST['funcao'],
			'regular' => $_POST['regular'],
			'horario' => insertedID
        );
		
		$this->load->model('offer/add_offer_model', 'offerModel');
		
		//cria nova oportunidade
		$offerID = $this->load->offerModel->add($offer);
		
		if($offerID == -1 )
			return false;
		else
			return true;
	 }
}
