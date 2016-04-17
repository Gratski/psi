<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 13:45
 */
class Schedule_model extends CI_Model
{

    /**
     * Actualiza o horario em base de dados
     * @param $id, id de horario a actualizar
     * @param $horario, dados de novo horario
     * @return true se alterou, false caso contrario
     */
    public function update($id, $horario){
        $this->db->where('id', $id);
        $this->db->update('Horario', $horario);
        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

}