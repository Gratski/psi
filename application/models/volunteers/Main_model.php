<?php

class Main_model extends CI_Model {

    /**
     * 	obter informacao detalhada sobre um voluntario a partir do email
     */
    public function getVolunteerByEmail($email) {

        $select = 'u.*, v.foto as foto, v.horario as horario, v.data_nascimento as data_nascimento, f.nome as freguesia, c.nome as concelho, d.nome as distrito, p.nome as pais';
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


        return (count($res) == 0) ? null : $res[0];
    }

    /**
     * 	obter informacao detalhada sobre uma Instiruicao a partir do emal
     */
    public function getInstitutionByEmail($email) {

        $select = 'u.*, f.nome as freguesia, c.nome as concelho, '
                . 'd.nome as distrito, p.nome as pais';
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
        
        return (count($res) == 0) ? null : $res[0];
    }

}
