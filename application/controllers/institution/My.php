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
		
		$this->load->model('offer/get_offer_model', "offerM");
		$date = date('Y').'-'.date('m').'-'.date('d');
		$oportunities = $this->offerM->getOffersByInstitutionIDAndDate($dadosProfile->id,$date);
		
		
		$matchesPorOffer = array();
		$this->load->model('offer/get_Matched_Offers', "matchModel");
		for ($i = 0; $i < sizeof($oportunities); $i++) {
			$match = $this->matchModel->matchToInstitution($oportunities[$i]->area, $oportunities[$i]->grupo,
							$oportunities[$i]->freguesia,$oportunities[$i]->hora_inicio, $oportunities[$i]->hora_fim,
							$oportunities[$i]->data_inicio, $oportunities[$i]->data_fim);
							
			$matches = array();
			
			foreach ($match as $value) {
				$matchInformation = array (
							"id" => $value->id,
							"nome"=> $value->nome,
							"nascimento => $value->data_nascimento",
							"numeroDeMatchs" => 0,
							"area" => "none",
							"grupo" => "none",
							"freguesia" => "none"
				);
				$numMatches = 0;
				if($value->area == $oportunities[$i]->area) {
					$numMatches += 1;
					$matchInformation['area'] = $oportunities[$i]->area;
				}
				
				if($value->grupo == $oportunities[$i]->grupo) {
					$numMatches += 1;
					$matchInformation['grupo'] = $oportunities[$i]->grupo;
				}
				
				if($value->id == $oportunities[$i]->freguesia) {
					$numMatches += 1;
					$matchInformation['freguesia'] = $oportunities[$i]->freguesia;
				}
				$matchInformation['numeroDeMatchs'] =$numMatches; 
				
				array_push($matches, $matchInformation);				
			}
			
			array_push($matchesPorOffer, $matches);	
		
		}

		
		$dadosMatches = array("oportunidades"=> $oportunities, "matchesPorOportunidade" => $matchesPorOffer);
		/*
		$this->load->model('offer/get_Matched_Offers', "matchModel");
		$match = $this->matchModel->matchToInstitution($oportunities[0]->area, $oportunities[0]->grupo,
						$oportunities[0]->freguesia,$oportunities[0]->hora_inicio, $oportunities[0]->hora_fim,
						$oportunities[0]->data_inicio, $oportunities[0]->data_fim);
		print_r($match);
		*/
    	$this->load->view('institution/menu', $dadosMenu);
        $this->load->view('institution/profile/header', $dadosProfile);
        $this->load->view('institution/myprofile',$dadosMatches);
        $this->load->view('common/footer');
    }

}