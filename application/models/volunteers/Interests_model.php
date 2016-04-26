<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 14:10
 */
class Interests_model extends CI_Model
{

    /**
     * Adiciona uma area de um grupo aos interesses de um voluntario
     * @param $volunteer, voluntario a considerar
     * @param $area, area a considerar
     * @param $group, grupo de area a considerar
     * @return true se inserido, false caso contrario
     */
    public function add($volunteer, $area, $group){

        $data = array(
            'voluntario' => $volunteer,
            'area' => $area,
            'grupo' => $group
        );

        //se inserido
        if($this->db->insert('Interesses_Voluntario', $data))
            return true;
        else
            return false;

    }

}