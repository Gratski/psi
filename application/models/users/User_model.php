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
        $email = $this->db->select('email')->from('Utilizador u ')->where('u.id', $id)->get();

        $e = $email->result()[0];

        $user = $this->getUserByEmail($e->email);

        $voluntario = $this->db->select('*')->from('Voluntario')->where('utilizador', $id)->get();

        $array = array();
        $info = $voluntario->result()[0];

        foreach ($user as $key => $value) {
            $array[$key] = $value;
        }
        foreach ($info as $key => $value) {
            $array[$key] = $value;
        }

        return (count($array) != 0) ? $array : NULL;
    }

    /**
     * connection to the db and update the info for the user
     * @param type $id -> id passed from the session
     * @param type $infoUpdated  associative array captured 
     * from the form with all the information to be updated
     */
    public function updateUser($id, $infoUpdated) {
        $userInfo = array();
        $volunteerInfo = array();


        foreach ($infoUpdated as $key => $value) {
            if ($key == 'nome' 
                    || $key == 'email' 
                    || $key == 'passord' 
                    || $key == 'telefone' 
                    ) {
                $userInfo[$key] = $value;
            }if($key == 'genero' 
                    || $key == 'foto'
                    || $key == 'data_nascimento') {
                $volunteerInfo[$key] = $value;
            }
        }

        $this->db->where('id', $id);
        $this->db->update('Utilizador', $userInfo);
        
        $this->db->where('utilizador', $id);
        $this->db->update('Voluntario', $volunteerInfo);
        
       $fullaraay= array_merge($userInfo, $volunteerInfo);
       
        return $fullaraay;
    }

}
