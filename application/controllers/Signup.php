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
        if($this->user_model->getUserByEmail($_POST['email']) == null)
        {
            $_SESSION['has_error'] = true;
            $_SESSION['error_message'] = 'Email já existe';
            $go_to = 'signup/volunteer';
        }
        else{
            $this->load->model('volunteers/Signup_model', 'signup_model');
            $newUser = array(
                'user' => $this->prepareUserData(),
                'volunteer' => $this->prepareVolunteerData(),
                'foto' => $_FILES['foto']
            );
            $inserted = $this->signup_model->insert($newUser);

            if(!$inserted){
                $_SESSION['has_error'] = true;
                $_SESSION['error_message'] = 'Algo correu errado :/';
                $go_to = 'signup/volunteer';
            }
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
     * @return novo utilizador pronto a ser inserido
     */
    private function prepareUserData(){
        $user = array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'telefone' => $_POST['telefone'],
            'freguesia' => 1,
            'user_type' => $_POST['user_type']

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
            'genero' => $_POST['genero'],
            'habilitacoes' => $_POST['habilitacoes'],
            'data_nascimento' => $_POST['data_nascimento']
        );
        return $volunteer;
    }

}