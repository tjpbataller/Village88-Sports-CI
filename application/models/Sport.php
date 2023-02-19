<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Model
{
    public function show_all()
    {
        $query = "SELECT * FROM sports";
        return $this->db->query($query)->result_array();
    }
}

?>