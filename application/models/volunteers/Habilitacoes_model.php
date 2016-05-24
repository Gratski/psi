<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Habilitacoes_model extends CI_Model
{

	public function remove($id){

		$this->db->where('voluntario', $this->session->user_details->id)
					->where('habilitacoes', $id)
					->delete('Voluntario_Habilitacoes');

		$this->db->where('id', $id)
					->delete('Habilitacoes');

	}

	public function add($data){
		$inserted = $this->db->insert('Voluntario_Habilitacoes', $data);
		if($inserted)
			return $this->db->insert_id();
		return -1;
	}

	public function createHabilitacoes($grau, $area){

		$array = Array(
				'grau' => $grau,
				'area' => $area
 			);

		$inserted = $this->db->insert('Habilitacoes', $array);
		if($inserted)
			return $this->db->insert_id();
		return -1;

	}

	public function getUserAreas(){
		
		$query = $this->db->query('SELECT h.id as id, h.area as area, h.grau as grau FROM Habilitacoes h, Voluntario_Habilitacoes vh WHERE vh.voluntario = '.$this->session->user_details->id.' and h.id = vh.habilitacoes');
		
        $res = $query->result();
        return $res;

	}

}