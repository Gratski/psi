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
    public function insert($data, $userType){
        $date = date('Y').'-'.date('m').'-'.date('d');
        $newUser = array(
            'nome' => $data['user']['nome'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'telefone' => $data['user']['telefone'],
            'criado_a' => $date,
            'actualizado_a' => $date,
            'freguesia' => 1

        );
        $this->db->insert('Utilizador', $newUser);
        $id = $this->db->insert_id();
        
        echo "NEW ID: " . $id . '<br>';

        //verifica se inseriu
        $this->load->model('users/User_model', 'user_model');
        $user = $this->user_model->getUserByEmail($newUser['email']);
        if($user == null){
            echo "<br>ERRO AO OBTER USER<br>";
            return -1;
        }
    
        //se eh voluntario
        if($userType == 'Volunteer')
        {
            echo "USER ID: " . $user->id.'<br>';
            $data['volunteer']['utilizador'] = $user->id;
            $inserted = $this->db->insert('Voluntario', $data['volunteer']);
            
            // se ocorreu um erro ao registar
            if(!$inserted){
                $id = -1;
            }

            // se registou voluntário guarda a sua picture
            else{


                // se fez upload de foto
                if(isset($data['user']['foto']))
                {
                    echo "criou voluntário";
                    $uploaded_foto = 0;
                    $foto = $data['user']['foto'];

                    $basePath = '../../'.base_url().'/assets';
                    if(file_exists($basePath))
                        echo "ASSETS EXISTS";
                    else
                        echo "ASSETS NOT EXISTS";

                    $folder = $basePath.'/img/users/'.$user->id.'/';

                    echo "BASE URL IS: " .$folder;
                    //create directory
                    mkdir($folder, 0777, true);
                    if(!file_exists($folder))
                        return -1;

                    echo "CRIOU PASTA";

                    $pictureDir = $folder . basename($foto['name']);
                    if(move_uploaded_file($foto['tmp_name'], $pictureDir))
                        $this->setHasFoto($user->id);
                }
            }
        }
        return $id;

    }

    public function setHasFoto($volunteer){
        $query = $this->db->set('foto', 1)
                    ->where('utilizador', $volunteer)
                    ->update('Voluntario');

    }

    private function uploadFile($file){
        return true;
    }

}