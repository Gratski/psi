<?php
require_once('VoluntarioController.php');
/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:52
 */
class Edit extends VoluntarioController
{

    /**
     * Edit constructor.
     * @see VoluntarioController
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtem as areas de interesse de um dado voluntario
     * @return array com user, e as suas areas
     */
    public function areas(){
        $this->load->model('volunteers/Areas_model', 'areas_model');

        $user = $this->session->user_details;
        $user_areas = $this->areas_model->getAll($this->session->user_id);
        $response = array($user, $user_areas);

        //gerar views
        $this->load->view('menu');
        $this->load->view('volunteer/edit/areas', $response);
        $this->load->view('footer');
    }

    /**
     * Actualiza a agenda de um voluntário.
     */
    public function schedule(){

        $horario_id = $_POST['horario'];
        $horario = array(
            'hora_inicio' => $_POST['hora_inicio'],
            'hora_fim' => $_POST['hora_fim'],
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim']
        );

        $this->load->model('schedule/Schedule_model', 'sm');

        //se actualizado
        if($this->sm->update($horario_id, $horario))
        {
            $_SESSION['flash'] = 'Horario actualizado!';
            redirect('volunteer/myprofile');
        }
        else
        {
            $_SESSION['flash'] = 'Ups.. algo correu mal. Tente novamente.';
            redirect('volunteer/edit/schedule');
        }


    }

}