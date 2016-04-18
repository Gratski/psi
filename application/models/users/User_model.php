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
        $query = $this->db->select('*')
                ->from('Utilizador As U')
                ->where('email', $email)
                ->join('Freguesia As F', 'U.freguesia = F.id', 'INNER')
                ->join('Concelho As C', 'C.id = F.concelho', 'INNER')
                ->join('Distrito As D', 'D.id = C.distrito', 'INNER')
                ->join('Pais P', 'P.id = D.pais', 'INNER')
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
                ->from('Utilizador')
                ->where('id', $id)
                ->get();
       
        $info = $query->result()[0];
        return (count($info) != 0) ? $info: NULL;
    }

    public function createUser() {
        
    }

    public function deleteUser() {
        
    }

    /**
     * connection to the db and update the info for the user
     * @param type $id -> id passed from the session
     * @param type $infoUpdated  associative array captured 
     * from the form with all the information to be updated
     */
    public function updateUser($id, $infoUpdated) {
        $this->db->where('id', $id);
        $this->db->update('Utilizador', $info);

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
