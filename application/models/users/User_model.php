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
                ->where('utilizador', $id)
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
                ->where('utilizador', $id)
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
                ->join('Distrito d', 'd.id = c.distrito')
                ->join('Pais p', 'p.id = d.pais')
                ->limit(1)
                ->get();
        $res = $query->result();
        if (count($res) == 0)
            return null;
        else
            return $res[0];
    }

    public function readUser($id) {
        // get the email of the user
        $user =  $this->getAllInfo('id', 1);
        $id4=1;
            $sel = "SELECT * FROM TABLE Voluntario WHERE utilizador = 1";
           
       $query = $this->db->query($sel);
        
        print_r($query);

        return $user != NULL ? $user : NULL;
    }

    private function getAllInfo($type, $value) {
        $select = 'u.*, f.nome as freguesia, c.nome as concelho, d.nome as distrito, p.nome as pais';
        $query = $this->db->select($select)
                ->from('Utilizador u')
                ->where('u.'.$type, $value)
                ->join('Freguesia f', 'u.freguesia = f.id')
                ->join('Concelho c', 'c.id = f.concelho')
                ->join('Distrito d', 'd.id = c.distrito')
                ->join('Pais p', 'p.id = d.pais')
                ->limit(1)
                ->get();
        $res = $query->result();
        return count($res) == 0 ? NULL : $res[0];
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
