<?php

require_once('VoluntarioController.php');

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:52
 */
class Edit extends VoluntarioController {

    /**
     * Edit constructor.
     * @see VoluntarioController
     */
    public function __construct() {
        parent::__construct();
    }

    ///////////////////////////////////////////////////////////////////////////
    //                             GET                                       //
    ///////////////////////////////////////////////////////////////////////////
    /**
     * Obtem as areas de interesse de um dado voluntario
     */
    public function areas() {
        $this->load->model('volunteers/Areas_model', 'areas_model');
        $this->load->model('volunteers/Main_model', 'mm');
        $user = $this->mm->getVolunteerByEmail($this->session->user_details->email);
        
        $user_areas = $this->areas_model->getAll($this->session->user_id);

        //obter areas ainda por adicionar
        //testar depois de estar a inserir uma area

        $response = array($user, $user_areas);

        $areas_ids = $this->getAreasIds($user_areas);
        
        $groups_ids = $this->getGroupsIds($user_areas);
        
        $complement = $this->areas_model->getComplement($user->id, $areas_ids, $groups_ids);
        
        $response = array(
             'user' => $user, 
             'user_areas' => $user_areas, 
             'user_areas_complement' => $complement);
			  
        //gerar views
        $this->load->view('common/menu', $user);
        $this->load->view('volunteer/profile/header', $response);
        $this->load->view('volunteer/edit/areas', $response);
        $this->load->view('common/footer');
    }

    ///////////////////////////////////////////////////////////////////////////
    //                             PUT                                       //
    ///////////////////////////////////////////////////////////////////////////
    /**
     * Actualiza a agenda de um voluntário.
     */
    public function put_schedule() {

        $horario = array(
            'hora_inicio' => $_POST['hora_inicio'],
            'hora_fim' => $_POST['hora_fim'],
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim']
        );
        
        $this->load->model('schedule/Schedule_model', 'sm');

		//se ja tem horario: actualiza-o
		$horario_ID = $this->sm->hasHorario();
		if( $horario_ID > -1 ) {
				
			if ($this->sm->update($horario_ID, $horario)) {
				setFlash('success', 'Horario actualizado!');
				redirect('volunteer/my');
			}else {
				setFlash('danger', 'Ups.. algo correu mal. Tente novamente.');
				redirect('volunteer/edit/schedule');
			}
		}
		//se não tem horario: cria um novo
		else {
			
			if($this->sm->create_and_update($horario)){
				setFlash('success', 'Horario criado!');
				redirect('volunteer/my');
			}
			else {
				setFlash('danger', 'Ups.. algo correu mal. Tente novamente.');
			  redirect('volunteer/edit/schedule');
			}
		}
	}

    /**
     * Adiciona uma area de interesse ao um voluntario
     */
    public function post_areas() {

        //obtem valores de variaveis em PUT
        $volunteer = $_POST['utilizador'];
        $area = $_POST['area'];
        $grupo = $_POST['grupo'];
        $this->load->model('volunteers/Interests_model', 'im');

        //se inserida
        if ($this->im->add($volunteer, $area, $grupo)) {
            setFlash('success', 'Interesse adicionado');
            redirect('volunteer/edit/areas');
        }
        //se nao inserida
        else {
            setFlash('danger', 'Interesse nao adicionado');
            redirect('volunteer/edit/areas');
        }
    }

    /**
     * function to delete an area of interest of a volunteer
     */
    public function delete_areas() {

        // load model de areas de voluntario
        $this->load->model('volunteers/Areas_model', 'am');

        // remove area pretendida
        $affected_rows = $this->am->deleteArea($_POST['area_id'], $_POST['grupo_id']);

        // prepara flash resposta
        setFlash('success', 'Área de interesse eliminada com sucesso!');

        // redireciona novamente para edit areas
        redirect('volunteer/edit/areas');

    }

    public function add_area(){

       // load model de areas de voluntario
        $this->load->model('volunteers/Areas_model', 'am');

        // remove area pretendida
        $affected_rows = $this->am->addArea($_POST['area_id'], $_POST['grupo_id']);

        // prepara flash resposta
        setFlash('success', 'Área de interesse eliminada com sucesso!');

        // redireciona novamente para edit areas
        redirect('volunteer/edit/areas');  

    }

    /**
     * function to get the basic info from the user
     */
    public function basic() {
        $this->load->model('volunteers/Main_model', 'user_model');
        $user_info = $this->user_model->getVolunteerByEmail($this->session->user_details->email);

        $this->load->model('volunteers/Habilitacoes_model', 'hm');
        $habilitacoes = $this->hm->getUserAreas();

        $viewInfo = Array(
            'habilitacoes' => $habilitacoes,
            'user' => $user_info
            );

        //print_r($user_info);
        //query is not empty respond to the correct view
        if ($user_info != NULL) {
            //gerar views
            $this->load->view('common/menu', $user_info);
            $this->load->view('volunteer/edit/basic', $viewInfo);
            $this->load->view('common/footer');
        }
        // something went wrong display the 404 view
        else {
            $this->load->view('views/errors/cli/404.php');
        }
    }

    public function removeHabilitacoes(){

        $habilitacao = $_POST['id'];
        $this->load->model('volunteers/Habilitacoes_model', 'hm');
        $this->hm->remove($habilitacao);

        redirect('/volunteer/edit/basic');

    }

    public function addHabilitacao(){

        $area = $_POST['area'];
        $grau = $_POST['grau'];

        // criar habilitacao
        $this->load->model('volunteers/Habilitacoes_model', 'hm');
        $hab = $this->hm->createHabilitacoes($grau, $area);

        // add habilitacao a volunteer
        $arr = Array(
                'habilitacoes' => $hab,
                'voluntario' => $this->session->user_details->id
            );
        $this->hm->add($arr);

        redirect('/volunteer/edit/basic');
    }

    /**
     * method to update the basic info for the user
     * grabs the post made in the form update it to an associative array
     */
    public function updateBasic() {

        $this->load->model('users/User_model', 'um');

        $this->load->model('volunteers/Main_model', 'vm');
        $email = $this->session->user_details->email;

        $dadosProfile = $this->vm->getVolunteerByEmail($email);

        $user = $this->session->user_details;

        $info = array();

        foreach ($_POST as $key => $value) {
            $info [$key] = $value;
        }

        $userInfo = $this->um->updateUser($this->session->user_id, $info);


        $user = Array(
                'user' => $dadosProfile
            );

        setFlash("success", "Perfil editado com sucesso!");
        redirect('/volunteer/my');
    }

    public function updateColumn() {

        $field = $_POST['field'];
        $value = $_POST['value'];

        $this->load->model('volunteers/Edit_model', 'em');
        $this->em->updateColumn($field, $value);

        redirect('/volunteer/edit/basic');

    }

    public function updateVolunteerColumn(){
        $field = $_POST['field'];
        $value = $_POST['value'];

        $this->load->model('volunteers/Edit_model', 'em');
        $this->em->updateVolunteerColumn($field, $value);

        redirect('/volunteer/edit/basic');

    }

    public function updatePassword(){

        $actual = $_POST['actual'];
        $nova = $_POST['nova'];
        $novaConfirmacao = $_POST['novaConfirmacao'];

        $this->load->model('volunteers/Edit_model', 'em');
        $this->em->updatePassword('password', $nova);

        redirect('/volunteer/edit/basic');

    }

    /**
     * function to get the schedule of the user
     */
    public function schedule() {
        $this->load->model('schedule/Schedule_model', 'sm');
        $this->load->model('volunteers/Main_model', 'vm');
        $currenteSchedule = $this->sm->getSchedule();
        $user_info = $this->vm->getVolunteerByEmail($this->session->user_details->email);
        
        $this->load->view('common/menu', $user_info);

        if ($currenteSchedule != NULL) {

            $this->load->view('volunteer/edit/schedule', $currenteSchedule);
        } else {
            $this->load->view('volunteer/edit/schedule');
        }
        $this->load->view('common/footer');
    }

    private function getAreasIds($list) {
        $res = array();
        for ($i = 0; $i < count($list); $i++) {
            $res[$i] = $list[$i]->area_id;
        }
        return $res;
    }

    private function getGroupsIds($list) {
        $res = array();
        for ($i = 0; $i < count($list); $i++) {
            $res[$i] = $list[$i]->grupo_id;
        }
        return $res;
    }

}
