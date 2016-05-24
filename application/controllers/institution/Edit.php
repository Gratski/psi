<?php

require_once('InstitutionController.php');

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 14:52
 */
class Edit extends InstitutionController {

    /**
     * Edit constructor.
     * @see VoluntarioController
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * function to get the basic info from the user
     */
    public function basic() {
        $this->load->model('users/User_model', 'user_model');
        $user_info = $this->user_model->readUserI($this->session->user_id);
        //print_r($user_info);
        //query is not empty respond to the correct view
        if ($user_info != NULL) {
            //gerar views
            $this->load->view('institution/menu', $user_info);
            $this->load->view('institution/edit/basic', $user_info);
            $this->load->view('common/footer');
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
        $this->load->model('users/User_model', 'um');

        $user = $this->session->user_details;

        $info = array();

        foreach ($_POST as $key => $value) {
            $info [$key] = $value;
        }

        $userInfo = $this->um->updateUserI($this->session->user_id, $info);
        
        setFlash("success", "Perfil actualizado com sucesso!");
        redirect("/institution/my");
    }
}