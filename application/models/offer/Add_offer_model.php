<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Add_offer_model extends CI_Model
{

	public function add($data){
		$inserted = $this->db->insert('Oportunidade', $data);
		if($inserted)
			return $this->db->insert_id();
		return -1;
	}

}