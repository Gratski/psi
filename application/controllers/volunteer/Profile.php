<?php

/**
 * Description of Profile
 *
 * @author antonio
 */
class Profile extends CI_Controller {

    public function index($id) {

        $this->load->model('users/User_model', 'um');

        $user_info = $this->um->readUser($id);
        

        //query is not empty respond to the correct view
        if ($user_info != NULL) {
            $response = array();
            foreach ($user_info as $key => $value) {
                $response[$key] = $value;
            }
            //gerar views
               $this->load->view('common/menu');
            $this->load->view('volunteer/profile', $response);
             $this->load->view('common/footer');
        }
        // something went wrong display the 404 view
        else {
            $this->load->view('views/errors/cli/404.php');
        }
    }


    public function yo(){
        $this->load->view('common/simple_menu');
        $this->load->view('institution/edit/basic');
        $this->load->view('common/footer');
    }

}
