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

        $user = $this->session->user_details;
        $user_areas = $this->areas_model->getAll($this->session->user_id);

        //obter areas ainda por adicionar
        //testar depois de estar a inserir uma area

        $response = array($user, $user_areas);
        echo 'RESPOSTA TODA<br>';
        echo var_dump($response);
        echo '<br>==========================<br>';
        echo 'USER AREAS<br>';
        echo var_dump($user_areas);

        echo '<br>==========================<br>';

        $areas_ids = $this->getAreasIds($user_areas);
        echo 'IDS DE AREAS<br>';
        echo var_dump($areas_ids);
        echo '<br>==========================<br>';

        $groups_ids = $this->getGroupsIds($user_areas);
        echo 'IDS DE GRUPOS<br>';
        echo var_dump($groups_ids);
        echo '<br>==========================<br>';

        $complement = $this->areas_model->getComplement($user->id, $areas_ids, $groups_ids);
        echo 'COMPLEMENT<br>';
        echo var_dump($complement);
        echo '<br>==========================<br>';

        //gerar views
        $this->load->view('common/menu');
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

        $put = parseFromInputStream();

        $horario_id = $put['horario'];
        $horario = array(
            'hora_inicio' => $put['hora_inicio'],
            'hora_fim' => $put['hora_fim'],
            'data_inicio' => $put['data_inicio'],
            'data_fim' => $put['data_fim']
        );

        $this->load->model('schedule/Schedule_model', 'sm');

        //se actualizado
        if ($this->sm->update($horario_id, $horario)) {
            setFlash('success', 'Horario actualizado!');
            redirect('volunteer/myprofile');
        }
        //se nao actualizado
        else {
            setFlash('danger', 'Ups.. algo correu mal. Tente novamente.');
            redirect('volunteer/edit/schedule');
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
        //receive an array throw post of the areas recorded
        $areas = array();

        if (!(isset($_POST))) {
            foreach ($_POST as $key => $value) {
                $areas [$key] = $value;
            }
        }
        print_r($areas);
        $this->Areas_model->deleteArea($areas);

        $this->load->view('volunteer/myprofile');
    }

    /**
     * function to get the basic info from the user
     */
    public function basic() {
        $this->load->model('users/User_model', 'user_model');
        $user_info = $this->user_model->readUser($this->session->user_id);

        //query is not empty respond to the correct view
        if ($user_info != NULL) {
            $response = array();
            foreach ($user_info as $key => $value) {
                $response[$key] = $value;
            }
            //gerar views
            $this->load->view('menu');
            $this->load->view('volunteer/edit/basic', $response);
            $this->load->view('footer');

            print_r($response);
        }
        // something went wrong display the 404 view
        else {
            $this->load->view('views/errors/cli/404.php');
        }
    }

    /**
     * method to update the basic info for the user
     * grabs the post made in the form update it to an associative array
     */
    public function updateBasic() {
        $this->load->model('users/User_model', 'user_model');

        $user = $this->session->user_details;
        $info = array();

        if (!(isset($_POST))) {
            foreach ($_POST as $key => $value) {
                $info [$key] = $value;
            }
        }
        $response = "Yor information has been updated";
        $this->user_model->updateUser($this->session->user_id, $info);
        $this->load->view('menu');
        $this->load->view('volunteer/myprofile', $response);
        $this->load->view('footer');
    }

    /**
     * function to get the schedule of the user
     */
    public function get_schedule() {
        $this->load->model('schedule/Schedule_model', 'sm');
        $currenteSchedule = $this->sm->getSchedule($this->session->user_id);

        if ($currenteSchedule != NULL) {
            $response = array();
            foreach ($currenteSchedule as $key => $value) {
                $response[$key] = $value;
            }
            //generate views
            $this->load->view('volunteer/edit/basic', $response);
        } else {
            $this->load->view('volunteer/edit/basic', "Horário não definido");
        }
    }



    private function getAreasIds($list){
        $res = array();
        for($i = 0; $i < count($list); $i++)
        {
            $res[$i] = $list[$i]->area_id;
        }
        return $res;
    }

    private function getGroupsIds($list){
        $res = array();
        for($i = 0; $i < count($list); $i++)
        {
            $res[$i] = $list[$i]->grupo_id;
        }
        return $res;
    }

}
