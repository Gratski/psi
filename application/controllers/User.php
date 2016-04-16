<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 01:21
 */
class User extends CI_Controller
{

    /**
     * Login de utilizador
     * O utilizador eh redirecionado conforme o tipo de utilizador que eh
     * POST
     */
    public function createSession(){
        $this->load->model('users/User_model', 'user_model');

        //obtem dados de post
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //autentica
        $auth = $this->user_model->auth($email, $pass);

        //se nao auth redireciona para form de login
        if($auth == null) {
            redirect("login/");
            return;
        }

        //insere em sessao os dados de user
        $this->load->library('session');
        $this->session->set_userdata('user_id', $auth->id);
        $this->session->set_userdata('user_details', $auth);

        //redireciona com base no tipo de user
        if($this->user_model->isVolunteer($auth->id)){
            
            redirect('volunteer/my');
            return;
        }
        else if($this->user_model->isInstitution($auth->id)){
            redirect('/institution/my');
            return;
        }
        else{
            echo "user id: " . $auth->id;
            echo "<p>Para o redirecionamento funcionar o utilizador deve ter um tipo, ou seja, voluntario ou instituicao</p>";
            echo "<p>Actualmente simplesmente eh utilizador. Inserir em base de dados :)</p>";
        }
    }
    function destroySession(){
        $this->session->unset_userdata('user_id');
        redirect('welcome/');
    }

}