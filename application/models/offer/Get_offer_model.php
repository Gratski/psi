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
		
		
		$query = $this->db->select(*);
							->from("Oportunidade O")
							->where("O.institution", $id)
							->get();
		
		$res = $query->result();
		
		return $res;
	}

}