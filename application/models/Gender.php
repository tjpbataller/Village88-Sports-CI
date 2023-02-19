<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gender extends CI_Model
{
    public function show_all()
    {
        $query = "SELECT * FROM genders";
        return $this->db->query($query)->result_array();
    }
}

?>