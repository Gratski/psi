<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 01:21
 */
class User_model extends CI_Model {

    public function auth($email, $pwd) {

        $this->load->database();

        $queryResult = $this->db->select('*')->from('Utilizador')
                ->group_start()
                ->where('email', $email)
                ->where('password', $pwd)
                ->group_end()
                ->limit(1)
                ->get();


        $arr = $queryResult->result();
        if (count($arr) < 1)
            return null;
        else
            return $arr[0];
    }

    public function isInstitution($id) {
        $is = false;

        $query = $this->db->select('*')
                ->from('Instituicao')
                ->group_start()
                ->where('utilizador', 1)
                ->group_end()
                ->get();
        $res = $query->result();

        echo "INST: " . count($res);
        if (count($res) > 0)
            $is = true;

        return $is;
    }

    public function isVolunteer($id) {

        $is = false;

        $query = $this->db->select('*')
                ->from('Voluntario')
                ->where('utilizador', 1)
                ->get();
        $res = $query->result();
        echo "VOLS: " . count($res);
        if (count($res) > 0)
            $is = true;

        return $is;
    }

    public function getUserByEmail($email) {
        $select = 'u.*, f.nome as freguesia, c.nome as concelho, d.nome as distrito, p.nome as pais';
        $query = $this->db->select($select)
                ->from('Utilizador u')
                ->where('email', $email)
                ->join('Freguesia f', 'u.freguesia = f.id')
                ->join('Concelho c', 'c.id = f.concelho')
                ->join('Distrito As d', 'd.id = c.distrito')
                ->join('Pais As p', 'p.id = d.pais')
                ->limit(1)
                ->get();
        $res = $query->result();
        if (count($res) == 0)
            return null;
        else
            return $res[0];
    }

    public function readUser($id) {
        $query = $this->db->select('*')
                ->from('Utilizador As U')
                //->from('Voluntario As V')
                ->from('Freguesia As F')
                //->from('Concelho As C')
                //->from('Distrito As D')
                ///->from('Pais P')
                ->where('U.id=', $id)
                ->where('U.Freguesia=', 'F,id')
                //->where('F.concelho', 'C.id')
                //->where('C.distrito', 'D.id')
                //->where('D.pais', 'P.id')
                // ->where('V.utilizador', 'U.id')
                ->get();

        print_r($query->result()[0]);
        $info = $query->result()[0];
        return (count($info) != 0) ? $info : NULL;
    }

    /**
     * connection to the db and update the info for the user
     * @param type $id -> id passed from the session
     * @param type $infoUpdated  associative array captured 
     * from the form with all the information to be updated
     */
    public function updateUser($id, $infoUpdated) {
        $this->db->where('id', $id);
        $this->db->update('Utilizador', $infoUpdated);
        print_r($infoUpdated);

//UI ISTO EH MTA FRUTA TEMOS DE GARANTIR QUE OS 
//CAMPOS DO SUBMIT TEM DE SER IGUAIS AOS DA BASE DE DADOS
//  $data = array(
//     'title' => $title,
//    'name' => $name,
//    'date' => $date
// );
//   $this->db->where('id', $id);
//  $this->db->update('mytable', $data);
// Produces:
//
        //      UPDATE mytable
//      SET title = '{$title}', name = '{$name}', date = '{$date}'
//      WHERE id = $id
//http://www.codeigniter.com/user_guide/database/query_builder.html#updating-data
    }

}
