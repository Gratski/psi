<?php
/*
 *Model para registar instituição
*/
class Signup_model extends CI_Model
{
	public function insert_user($data) {
		$date = date('Y').'-'.date('m').'-'.date('d');
        $newUser = array(
            'nome' => $data['nome'],
            'email' => $data['email'],
            'password' => $data['password'],
            'telefone' => $data['telefone'],
            'criado_a' => $date,
            'actualizado_a' => $date,
            'freguesia' => $data['freguesia']

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
		
		return $id;
		
	}
	
	public function insert_institution($data) {
		
		$inserted = $this->db->insert('instituicao', $data);
            
        // se ocorreu um erro ao registar
        return $inserted;
		
	}
	

	
	
}