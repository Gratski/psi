<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 13:45
 */
class Schedule_model extends CI_Model {

    
    public function create($horario){
            
        // get volunteers model
        $this->load->model('volunteers/Main_model', 'vm');
        
        // get volunteer by email
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
        
        // check if already exists
        if($user->horario != NULL)
            return false;
        
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
    public function update() {
        
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
        
        
        $currentSchedule = $this->getSchedule();
        if ($currentSchedule != NULL) {

            $this->db->where('id', $user->id);
            $this->db->update('Horario', $currentSchedule);
        }

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    /**
     * function to retrieve the current schedule from the user
     * @param type $idUser 
     * @return type the query or NULL (the user has no schedule defined)
     */
    public function getSchedule() {

        
        $this->load->model('volunteers/Main_model', 'vm');
        $user = $this->vm->getVolunteerByEmail($this->session->user_details->email);
        
        // se nao tem horario
        if($user->horario == NULL || $user->horario == 0)
            return NULL;
        
        //select the horario from the user 
        $query = $this->db->select('*')
                            ->from('Horario h')
                            ->where('h.id', $user->horario)
                            ->get();
        
        $horarioVoluntario = $query->result()[0];

        return $horarioVoluntario;
    }

}
