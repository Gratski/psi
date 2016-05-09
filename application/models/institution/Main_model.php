<?php

class Main_model extends CI_Model
{

	/**
	*	obter informacao detalhada sobre um voluntario
	*/
	public function getInstitutionByEmail($email){

        $select = 'u.*, i.*, f.nome as freguesia, c.nome as concelho, d.nome as distrito, p.nome as pais';
        $query = $this->db->select($select)
                ->from('Utilizador u')
                ->where('u.email', $email)
                ->join('Instituicao i', 'i.utilizador=u.id')
                ->join('Freguesia f', 'u.freguesia = f.id')
                ->join('Concelho c', 'c.id = f.concelho')
                ->join('Distrito d', 'd.id = c.distrito')
                ->join('Pais p', 'p.id = d.pais')
                ->limit(1)
                ->get();
        $res = $query->result();
		
        if (count($res) == 0){
            return null;
        }
        else
            return $res[0];
	}

}