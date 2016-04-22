<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 20:32
 */
class Signup extends CI_Controller
{

    /**
     * Mostra view comum de registo para escolha
     * do tipo de utilizador
     */
    public function index(){
        $this->load->view('common/signup');
    }

    /**
     * Registo de Voluntario
     * GET
     */
    public function volunteer(){
        $this->load->view('volunteer/signup');
    }

    /**
     * Insere um novo voluntario na base de dados
     * POST
     */
    public function volunteerCreate(){

        $go_to = 'login';

        //verifica se o utilizador com o dado email existe
        $this->load->model('users/User_model', 'user_model');
        $this->load->helper('flash');
        
        //se o utilizador existe
        if($this->user_model->getUserByEmail($_POST['email']) != null)
        {
            setFlash("danger","Email ja existente");
            redirect('signup/volunteer');
        }

        //inserir volunteer
        $this->load->model('volunteers/Signup_model', 'signup_model');
        $newUser = array(
            'user' => $this->prepareUserData(),
            'volunteer' => $this->prepareVolunteerData(),
            'habilitacoes' => $this->prepareHabilitacoes()
            //'foto' => $_FILES['foto']
        );
        $userId = $this->signup_model->insert($newUser, 'Volunteer');

        echo "Volunteer ID: " . $userId;
        echo "<br>";
        //se nao inseriu volunteer
        if($userId < 0){
            setFlash('danger','Algo correu errado :/');
            $go_to = 'signup/volunteer';
        }
        
        //insere habilitacoes
        $this->load->model('habilitacoes/Add_model', 'am');
        $habId = $this->am->add($newUser['habilitacoes']['0']);
        echo "HAB ID: " . $habId;
        //se nao inseriu as habilitacoes
        if($habId < 0)
        {
            setFlash('danger', 'Erro ao inserir habilitacoes');
            redirect('signup/volunteer');
        }

        //associa habilitacoes a voluntario
        $this->load->model('volunteers/Habilitacoes_model', 'vhm');
        $habss = array(
                'voluntario' => $userId,
                'habilitacoes' => $habId
            );
        $inserted = $this->vhm->add($habss);

        //se nao associou
        if($inserted < 0){
            setFlash('danger', 'Erro');
            redirect('signup/volunteer');
        }
        

        redirect($go_to);
    }

    /**
     * Registo de Instituicao
     * GET
     */
    public function institution(){
        //fazer render da view aqui
    }

    /**
     * Insere uma nova instituicao na base de dados
     * POST
     */
    public function institutionCreate(){

    }


    /**
     * Prepara os dados recebidos por POST
     * para serem inseridos em model
     * @param userType, tipo de utilizador
     * @return novo utilizador pronto a ser inserido
     */
    private function prepareUserData(){
        $user = array(
            'nome' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['pass'],
            'telefone' => $_POST['phone'],
            'freguesia' => 1,
            'data_nascimento' => '12/12/2016'

        );
        return $user;
    }

    /**
     * Prepara informacao recebida para inserir
     * um novo voluntario de acordo com a base de dados
     * @return voluntario pronto a inserir
     */
    public function prepareVolunteerData(){
        $volunteer = array(
            'genero' => $_POST['gender']
        );
        return $volunteer;
    }

    public function prepareHabilitacoes(){
        $hab = array(
            '0' => array(
                    'area' => $_POST['degree0'],
                    'grau' => $_POST['course0']
                ),
            '1' => array(
                    'area' => $_POST['degree1'],
                    'grau' => $_POST['course1']        
                ),
            '2' => array(
                    'area' => $_POST['degree2'],
                    'grau' => $_POST['course2']
                )
            );
        return $hab;
    }

}