<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 15:41
 */
class Edit_model extends CI_Model {

	public function updateColumn($field, $value)
	{
		$userId = $this->session->user_details->id;
		$this->db->set($field, $value);
		$this->db->where('id', $userId);
		$this->db->update('Utilizador');

	}

	public function updateVolunteerColumn($field, $value){

		$userId = $this->session->user_details->id;
		$this->db->set($field, $value);
		$this->db->where('utilizador', $userId);
		$this->db->update('Voluntario');

	}

	public function updatePassword($field, $value){
		$userId = $this->session->user_details->id;
		$this->db->set($field, $value);
		$this->db->where('id', $userId);
		$this->db->update('Utilizador');
	}

}

?>