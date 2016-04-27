<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 13:45
 */
class Schedule_model extends CI_Model {

    /**
     * Actualiza o horario em base de dados
     * @param $id, id de horario a actualizar
     * @param $horario, dados de novo horario
     * @return true se alterou, false caso contrario
     */
    public function update($id) {

        $currentSchedule = $this->getSchedule($id);
        if ($currentSchedule != NULL) {

            $this->db->where('id', $id);
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
    public function getSchedule($idUser) {

        //grab the id of the volunteer
        $query = $this->db->select('utilizador')
                        ->from('Voluntario As V')
                        ->where('V.utilizador', $idUser)->get();

        $id_vol = $query->result()[0];
        //select the horario from the user 
        $query2 = $this->db->select('horario')
                        ->from('Voluntario As v')
                        ->where('v.utilizador', $id_vol->utilizador)->get();
        $horarioVoluntario = $query2->result()[0];


        if (count($query2->result()[0]) == 0) {
            return NULL;
        }
        $query3 = $this->db->select('*')
                ->from('Horario As h')
                ->where('h.id', $horarioVoluntario->horario)
                ->get();

        return $query3->result()[0];
    }

}
