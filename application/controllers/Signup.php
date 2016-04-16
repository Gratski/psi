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

}