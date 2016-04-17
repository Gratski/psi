<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Signup_model extends CI_Model
{
    /**
     * Insere um novo utilizador em base de dados
     * @param $data, dados de novo utilizador
     */
    public function insert($data){
        $date = date('Y').'-'.date('m').'-'.date('d');
        $newUser = array(
            'nome' => $data['user']['nome'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'telefone' => $data['user']['telefone'],
            'criado_a' => $date,
            'actualizado_a' => $date,
            'freguesia' => $data['user']['freguesia']

        );
        $this->db->insert('Utilizador', $newUser);

        //verifica se inseriu
        $this->load->model('users/User_model', 'user_model');
        $user = $this->user_model->getUserByEmail($newUser['email']);
        if($user == null)
            return false;
        
        //se eh voluntario
        if($data['user_type'] == 'Volunteer')
        {
            $uploaded_foto = 0;
            $foto = $data['foto']['name'];
            $folder = 'pictures/';
            $pictureDir = $folder . basename($foto);
            if(move_uploaded_file($foto['tmp_name'], $pictureDir))
                $uploaded_foto = 1;

            $this->db->insert('Voluntario', $data['volunteer']);
        }
        
        return true;

    }

    private function uploadFile($file){
        return true;
    }

}