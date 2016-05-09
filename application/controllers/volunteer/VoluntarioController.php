<?php
/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:56
 */
class VoluntarioController extends MY_Controller
{
    /**
     * VoluntarioController constructor.
     * Este constructor faz a validacao de session
     */
    public function __construct()
    {
        parent::__construct();
        //TODO VERIFICAR SE O USER EH DO TIPO VOLUNTEER
    }

    //verificar se eh um utilizador do tipo volunteer
    private function isVolunteer(){

    	// TODO
    	return true;

    }
}