<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Get_offer_model extends CI_Model
{

	public function getOffersByInstitutionID($id){
		$query = $this->db->select('*')
                ->from('Oportunidade O')
                ->where("O.institution", $id)
                ->get();
		
		$res = $query->result();
		
		return $res;
	}


	public function getOfferByID($id){
		$select = "o.*, p.nome as pais, d.nome as distrito, c.nome as concelho, f.nome as freguesia, h.data_inicio as data_inicio, h.data_fim as data_fim, h.hora_inicio as hora_inicio, h.hora_fim as hora_fim, u.nome as instituicao";
		$query = $this->db->select($select)
                ->from('Oportunidade O')
                ->where("O.id", $id)
                ->join("Freguesia f", "f.id = o.freguesia")
                ->join("Concelho c", "c.id = f.concelho")
                ->join("Distrito d", "d.id = c.distrito")
                ->join("Pais p", "p.id = d.pais")
                ->join("Horario h", "h.id = o.horario")
                ->join("Utilizador u", "u.id = o.instituicao")
                ->get();
		
		$res = $query->result();
		
		return $res;
	}

}