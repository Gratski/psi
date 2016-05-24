<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 17/04/16
 * Time: 02:07
 */
class Main_model extends CI_Model
{

	/**
	*	obter informacao detalhada sobre um voluntario
	*/
	public function getVolunteerByEmail($email){

        $select = 'u.*, v.genero as genero, v.foto as foto, v.horario as horario, v.data_nascimento as data_nascimento, f.nome as freguesia, c.nome as concelho, d.nome as distrito, p.nome as pais';
        $query = $this->db->select($select)
                ->from('Utilizador u')
                ->where('u.email', $email)
                ->join('Voluntario v', 'v.utilizador=u.id')
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