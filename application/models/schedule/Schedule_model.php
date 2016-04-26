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
    public function update($id, $horario) {
        $this->db->where('id', $id);
        $this->db->update('Horario', $horario);
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
        $id_voluntario = $this->db->select('utilizador')
                        ->from('Voluntario As V')
                        ->where($idUser, 'V.utilizador')->get();

        //select the horario from the user 
        $query = $this->db->select('horario')
                ->from('Voluntario as V')
                ->where($id_voluntario, 'V.horario');

        return (count($query->result()[0]) != 0) ? $query->result()[0] : NULL;
    }

}
