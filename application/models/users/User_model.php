<?php

/**
 * Created by PhpStorm.
 * User: JoaoR
 * Date: 16/04/16
 * Time: 01:21
 */
class User_model extends CI_Model
{

    public function auth($email, $pwd){

        $this->load->database();

        $queryResult = $this->db->select('*')->from('Utilizador')
            ->group_start()
            ->where('email', $email)
            ->where('password', $pwd)
            ->group_end()
            ->limit(1)
            ->get();


        $arr = $queryResult->result();
        if(count($arr) < 1)
            return null;
        else
            return $arr[0];

    }

    public function isInstitution($id){
        $is = false;

        $query = $this->db->select('*')
                        ->from('Instituicao')
                        ->group_start()
                        ->where('utilizador', 1)
                        ->group_end()
                        ->get();
        $res = $query->result();

        echo "INST: " . count($res) ;
        if(count($res) > 0)
            $is = true;

        return $is;
    }

    public function isVolunteer($id){

        $is = false;

        $query = $this->db->select('*')
                    ->from('Voluntario')
                    ->where('utilizador', 1)
                    ->get();
        $res = $query->result();
        echo "VOLS: " . count($res);
        if(count($res) > 0)
            $is = true;

        return $is;

    }

    public function getUserByEmail($email){
        $query = $this->db->select('*')
            ->from('Utilizador')
            ->where('email', $email)
            ->limit(1)
            ->get();
        $res = $query->result();
        if(count($res) == 0)
            return null;
        else
            return $res[0];
    }
}