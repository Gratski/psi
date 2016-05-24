<?php

require_once ('VoluntarioController.php');

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 19:46
 */
class My extends VoluntarioController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
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

        //obter oportunidades com base nas preferencias do utilizador
        $this->load->model('offer/Get_Matched_Offers', 'match_model');
        $array_oportunidades = $this->match_model->matchToVolunteer($dadosProfile->id);
        $dadosProfile = array(
                'user' => $dadosProfile,
                'opportunities' => $array_oportunidades
            );

        $this->load->view('common/menu', $dadosMenu);
        $this->load->view('volunteer/profile/header', $dadosProfile);
        $this->load->view('volunteer/myprofile', $dadosProfile);
        $this->load->view('common/footer');
    }

}
