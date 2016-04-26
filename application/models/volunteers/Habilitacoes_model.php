<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Habilitacoes_model extends CI_Model
{

	public function add($data){
		$inserted = $this->db->insert('Voluntario_Habilitacoes', $data);
		if($inserted)
			return $this->db->insert_id();
		return -1;
	}

}