<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 13:45
 */
class Schedule_model extends CI_Model {
	
	/*
	 * Verifica se o utilizador tem horario
	 * Retorna o id do horario ou -1 caso não tenha
	*/
	public function hasHorario() {
		
		// get volunteers model
        $this->load->model('volunteers/Main_model', 'vm');
		
		// get volunteer by email
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
		
		 // check if already exists
        if($user->horario != NULL)
            return $user->horario;
		else
			return -1;
		
	}

    
    public function create($horario){
		// get volunteer by email
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
   
        // cria um novo horario
        $this->db->insert('Horario', $horario);
        $horario_id = $this->db->insert_id();
        
        // update volunteer table
        $this->db->set('horario', $horario_id)
                    ->where('utilizador', $user->id)
                    ->update('Voluntario');
        
        return true;
        
    }
    
    /**
     * Actualiza o horario em base de dados
     * @param $id, id de horario a actualizar
     * @param $horario, dados de novo horario
     * @return true se alterou, false caso contrario
     */
    public function update($horario_ID, $horario) {
    
		$this->db->where('id', $horario_ID);
		$this->db->update('Horario', $horario);
		
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	 
	/*
       if($currentSchedule = $this->getSchedule()) {
		 
		$this->db->where('id', $user->id);
		$this->db->update('Horario', $currentSchedule);
		
	   
	   return false;
	*/
	
    }

    /**
     * function to retrieve the current schedule from the user
     * @param type $idUser 
     * @return type the query or NULL (the user has no schedule defined)
     */

    public function getSchedule() {
		
		// get volunteer by email
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
		
		if($this->hasHorario()) {
      
			//select the horario from the user 
			$query = $this->db->select('*')
								->from('Horario h')
								->where('h.id', $user->horario)
								->get();
			
			$horarioVoluntario = $query->result();

			return $horarioVoluntario;
		}
		return false;
    }
}
