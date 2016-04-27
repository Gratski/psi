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

    /**
    * Obter todas os Grupo_Area do utilizador
    * @param id, id de utilizador de session a considerar
    * @return lista de Grupo_Area do utiliador de session
    */
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
    * Obter o complemento dos Grupo_Area do utilizador em session
    * @param userId, utilizador de session a ser considerado
    * @param areas, areas ja existentes do utilizador
    * @param groups, groups ja existentes do utilizador
    * @return lista de Grupo_Area complementar ao utilizador
    */
    public function getComplement($userId, $areas, $groups){
        $select = 'a.nome as area_nome, a.id as area_id, g.tipo as grupo_tipo, g.id as grupo_id';
        
        //se lista de groups ou areas eh vazia, cria por omissao
        if(count($groups) == 0 || count($areas) == 0)
        {
            $areas = array('0');
            $groups = array('0');
        }
        
        $query = $this->db->select($select)
                 ->from('Grupo_Area ga')
                    ->join('Grupo g', 'ga.grupo = g.id')
                    ->join('Area a', 'ga.area = a.id')
                    ->group_start()
                        ->where_not_in('a.id', $areas)
                        ->where_not_in('g.id', $groups)     
                    ->group_end()
                    ->get();
        $res = $query->result();
        return $res;
    }

    /**
     * function to delete areas of interest of the user
     * @param type $updatedAreas arrary like this [[area][grupo]] 
     * @param type $idUser 
     */
    public function deleteArea($area_id, $group_id) {

        // obtem user de session
        $userId = $this->session->user_details->id;

        // faz query de delete
        $query = $this->db->where('area', $area_id)
                            ->where('grupo', $group_id)
                            ->where('voluntario', $userId)
                            ->delete('Interesses_Voluntario');

    }

    public function addArea($area_id, $group_id) {

        // obtem user de session
        $userId = $this->session->user_details->id;

        // prepare data to be stored
        $data = array(
            'area' => $area_id,
            'grupo' => $group_id,
            'voluntario' => $userId
            );

        // faz query de delete
        $query = $this->db->insert('Interesses_Voluntario', $data);

    }

}
