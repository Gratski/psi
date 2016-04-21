<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 15:41
 */
class Areas_model extends CI_Model
{
    public function fetchVolunteerAreas(){
        $this->load->database();
        $id = $this->session->userdata('user_id');
        $queryResult = $this->db->select('Interesses_Voluntario')
            ->where('voluntario', $id)
            ->get();
        return $queryResult;
    }


    public function getAll($id){
        $this->db->select('*');
        $this->db->from('Interesses_Voluntario');
        $this->db->where('voluntario', $id);
        return $this->db->get();
    }

}