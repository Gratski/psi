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

    ///////////////////////////////////////////////////////////////////////////
    //                             GET                                       //
    ///////////////////////////////////////////////////////////////////////////
    /**
     * Obtem as areas de interesse de um dado voluntario
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


    ///////////////////////////////////////////////////////////////////////////
    //                             PUT                                       //
    ///////////////////////////////////////////////////////////////////////////
    /**
     * Actualiza a agenda de um voluntário.
     */
    public function put_schedule(){

        parse_str(file_get_contents('php://input'), $put);

        $horario_id = $put['horario'];
        $horario = array(
            'hora_inicio' => $put['hora_inicio'],
            'hora_fim' => $put['hora_fim'],
            'data_inicio' => $put['data_inicio'],
            'data_fim' => $put['data_fim']
        );

        $this->load->model('schedule/Schedule_model', 'sm');

        //se actualizado
        if($this->sm->update($horario_id, $horario))
        {
            setFlash('success', 'Horario actualizado!');
            redirect('volunteer/myprofile');
        }
        //se nao actualizado
        else
        {
            setFlash('danger', 'Ups.. algo correu mal. Tente novamente.');
            redirect('volunteer/edit/schedule');
        }
    }

    /**
     * Adiciona uma area de interesse ao um voluntario
     */
    public function put_areas(){

        parse_str(file_get_contents('php://input'), $put);
        $volunteer = $put['utilizador'];
        $area = $put['area'];
        $grupo = $put['grupo'];
        $this->load->model('volunteers/Interests_model', 'im');

        //se inserida
        if($this->im->add($volunteer, $area, $grupo)) {
            setFlash('success', 'Interesse adicionado');
            redirect('volunteer/myprofile');
        }
        //se nao inserida
        else{
            setFlash('danger', 'Interesse nao adicionado');
            redirect('volunteer/edit/areas');
        }
    }

}