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


	public function matchToInstitution($areaID, $grupoID, $freguesiaID, $horaInicio, $horaFim, $dataInicio, $dataFim) {
		
		/*
		$sql = "SELECT Freguesia.id, Freguesia.concelho, Utilizador.nome, 
						Voluntario.utilizador, Voluntario.data_nascimento,Horario.*,
						Interesses_Voluntario.area, Interesses_Voluntario.grupo
						
				FROM Freguesia,Utilizador, Voluntario,Horario, Interesses_Voluntario
				
				WHERE Voluntario.utilizador = Utilizador.id AND Utilizador.freguesia = Freguesia.id
						AND Voluntario.horario = Horario.id AND Interesses_Voluntario.voluntario = Voluntario.utilizador
						AND( (horario.hora_fim BETWEEN $horaInicio And $horaFim) OR (horario.hora_inicio BETWEEN $horaInicio And $horaFim) OR ($horaInicio  BETWEEN Horario.hora_inicio and Horario.hora_fim)) 
						AND( (horario.data_fim BETWEEN $dataInicio And $dataFim) OR (horario.data_inicio BETWEEN $dataInicio And $dataFim) OR ($dataInicio  BETWEEN Horario.data_inicio and Horario.data_fim))
						AND( Interesses_Voluntario.area = $areaID OR Interesses_Voluntario.grupo = $grupoID OR Freguesia.id = $freguesiaID)
						";
		
		*/
		
		$query = $this->db->select( 'Freguesia.id, Freguesia.concelho, Utilizador.nome, 
						Voluntario.utilizador, Voluntario.data_nascimento,Horario.*,
						Interesses_Voluntario.area, Interesses_Voluntario.grupo')
						->from('Utilizador')
						->join('Voluntario','Voluntario.utilizador = Utilizador.id')
						->join('Freguesia','Utilizador.freguesia = Freguesia.id')
						->join('Horario', 'Voluntario.horario = Horario.id')
						->join('Interesses_Voluntario','Interesses_Voluntario.voluntario = Voluntario.utilizador')
						
						->group_start()
							//hora dentro de um intervalo possivel
							->where("horario.hora_fim BETWEEN $horaInicio And $horaFim")
								->or_group_start()
									->where("horario.hora_inicio BETWEEN $horaInicio And $horaFim")
								->group_end()
								->or_group_start()
									->where("$horaInicio BETWEEN Horario.hora_inicio and Horario.hora_fim")
								->group_end()
						->group_end()
						
						->group_start()
							//data dentro de um intervalo possivel
							->where('horario.data_fim BETWEEN "'. $dataInicio. '" and "'. $dataFim.'"')
								->or_group_start()
									->where('horario.data_inicio BETWEEN "'. $dataInicio. '" and "'. $dataFim.'"')
								->group_end()
								->or_group_start()
									->where('"'.$dataInicio.'" BETWEEN Horario.data_inicio and Horario.data_fim')
								->group_end()
						->group_end()
						
						->group_start()
							//Area ou grupo ou Freguesia em comum
							->where("Interesses_Voluntario.area = $areaID")
								->or_group_start()
									->where("Interesses_Voluntario.grupo = $grupoID")
								->group_end()
								->or_group_start()
									->where("Freguesia.id = $freguesiaID")
								->group_end()	
						->group_end()
					
						->get();
		
		
		return $query->result();
	}


}

?>