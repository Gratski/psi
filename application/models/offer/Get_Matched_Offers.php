<?php 


class Get_Matched_Offers extends CI_Model{

	/*
		obtem as oportunidades que fazem match com o perfil de voluntario
		sao considerados os seguintes campos para matching:
			- interesses do voluntario
			- disponibilidade do voluntario
			- localizacao de oportunidade (ate ao nivel do concelho)
	*/
	public function matchToVolunteer($userId){

		$sql = "SELECT distinct O.id as opID, U.nome as instituicao, O.titulo as titulo, O.vagas as vagas, O.funcao as funcao FROM Oportunidade O, Instituicao I, Utilizador U, 
					Freguesia Fu, Concelho Cu, Distrito Du, 
					Freguesia Fo, Concelho Co, Distrito Do 

			WHERE 	U.id = $userId and
					Fu.id = U.freguesia and Cu.id = Fu.concelho and Du.id = Cu.distrito
					and
					Fo.id = O.freguesia and Co.id = Fo.concelho and Do.id = Co.distrito 
					and 
					(
					O.grupo IN (
									SELECT IV.grupo 
									FROM Interesses_Voluntario IV
									WHERE IV.voluntario = $userId
								)
					and
					O.area IN (
									SELECT IV.area 
									FROM Interesses_Voluntario IV
									WHERE IV.voluntario = $userId
								)
					)
					or
						(
							(U.freguesia = O.freguesia)
							or
							(Co.id = Cu.id)
							or
							(Do.id = Du.id)
						)
		GROUP BY O.id 
		ORDER BY O.id DESC  
		LIMIT 10";

		$userId = $this->session->user_details->id;

		$query = $this->db->query($sql);
		return $query->result();

	}


	public function matchToInstitution(){

	}


}

?>