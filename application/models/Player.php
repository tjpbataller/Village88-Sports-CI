<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Model
{
    public function show_all($query)
    {
        return $this->db->query($query)->result_array();
    }

    public function create_query($input)
    {
        $start = "SELECT players.id, players.name, players.image FROM players INNER JOIN genders ON genders.id = players.gender_id INNER JOIN sports ON sports.id = players.sport_id";
        $genders = array();
        $sports = array();
        $where = "";
        $and = "";
        $conditions = array();
        $conditions["name"] = $this->input->post("name", TRUE)?$this->input->post("name", TRUE):"";
        $conditions["gender"] = "";
        $conditions["sport"] = "";

        if(gettype($input) == "array")
        {
            foreach($input as $key => $value)
            {
                if(strpos($key, "sport") !== FALSE)
                {
                    $sports[] = $value;
                }
                if(strpos($key, "gender") !== FALSE)
                {
                    $genders[] = $value;
                }
            }
        }
        var_dump($sports);
        if(count($genders) > 0 || count($sports) > 0 || $conditions["name"] !== "")
        {
            $where = " WHERE ";
            if($conditions["name"] !== "")
            {
                $conditions["name"] = "players.name LIKE '%{$conditions["name"]}%' ";
            }
            if(count($genders) > 0)
            {
                $gender_option = "";
                if($conditions["name"] !== "")
                {
                    $and = " AND ";
                }
                foreach($genders as $key => $value)
                {
                    if($key === count($genders) - 1)
                    {
                        $gender_option .= "'{$value}'";
                    }
                    else
                    {
                        $gender_option .= "'{$value}', ";
                    }
                }
                $conditions["gender"] = $and."genders.name IN ({$gender_option})";
            }
            if(count($sports) > 0)
            {
                $sports_option = "";
                if($conditions["name"] !== "" || $conditions["gender"] !== "")
                {
                    $and = " AND ";
                }
                foreach($sports as $key => $value)
                {
                    if($key === count($sports) - 1)
                    {
                        $sports_option .= "'{$value}'";
                    }
                    else
                    {
                        $sports_option .= "'{$value}', ";
                    }
                }
                $conditions["sport"] = $and."sports.name IN ({$sports_option})";
                var_dump($conditions);
            }

        }
        if(count($genders) > 0 && count($sports) > 0)
        {
            $and = " AND ";
        }
        return $start.$where.$conditions["name"].$conditions["gender"].$conditions["sport"];
    }
}

?>