<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 15:41
 */
class Areas_model extends CI_Model {

    public function fetchVolunteerAreas() {
        $this->load->database();
        $id = $this->session->userdata('user_id');
        $queryResult = $this->db->select('Interesses_Voluntario')
                ->where('voluntario', $id)
                ->get();
        return $queryResult;
    }

    public function getAll($id) {
        //$select = 'ga.area as area_id, ga.grupo as grupo_id, g.tipo as grupo_tipo, a.nome as area_nome';
        $select = 'g.tipo as grupo_tipo, g.id as grupo_id, a.nome as area_nome, a.id as area_id';
        $this->db->select($select);

        $this->db->from('Interesses_Voluntario iv');
        $this->db->where('voluntario', $id);
        $this->db->join('Voluntario v', 'iv.voluntario = v.utilizador');
        $this->db->join('Utilizador u', 'v.utilizador = u.id');
        
        $this->db->join('Grupo_Area ga', 'ga.area = iv.area AND ga.grupo = iv.grupo');
        $this->db->join('Grupo g', 'g.id = ga.grupo');
        $this->db->join('Area a','a.id = ga.area');
        
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * function to delete areas of interest of the user
     * @param type $updatedAreas arrary like this [[area][grupo]] 
     * @param type $idUser 
     */
    public function deleteArea($updatedAreas, $idUser) {
        //iterate over them and every area that has no
        $this->load->database();

        //grab the id of the volunteer
        $id_voluntario = $this->db->select('utilizador')
                ->from('Voluntario As V')
                ->where($idUser, 'V.utilizador')->get();


        /* DELETE FROM Interesses_Voluntario As iv
         * WHERE $key = iv.area
         * AND $value = iv.grupo
         * AND $id_Volun = iv.voluntario
         * 
         */

        foreach ($updatedAreas as $key => $value) {
            $this->db->where($key, 'area')
            ->where($value, 'grupo')
            ->where($id_voluntario, 'voluntario')
            ->delete('Interesses_Voluntario');
        }
    }

}
