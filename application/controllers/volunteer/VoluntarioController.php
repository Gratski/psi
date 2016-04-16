<?php
/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:56
 */
class VoluntarioController extends CI_Controller
{
    /**
     * VoluntarioController constructor.
     * Este constructor faz a validacao de session
     */
    public function __construct()
    {
        parent::__construct();

        //se nao existe sessao -> redireciona p registo
        if(!$this->is_logged()){
            $this->redirectToRegist();
        }
    }

    /**
     * Verifica se um user esta logado
     * @return true se estah logged, false caso contrario
     */
    private function is_logged(){
        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');
        if(!isset($user_id)) {
            return false;
        }else{
            return true;
        }
    }

    /**
     * Redireciona para formulario de registo
     */
    private function redirectToRegist(){
        redirect('signup');
    }

}