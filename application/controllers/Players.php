<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Players extends CI_Controller {
    public function index()
    {
        /* Load needed models */
        $this->load->model("Gender");
        $this->load->model("Sport");
        $this->load->model("Player");
        if(!$this->session->userdata("query"))
        {
            $this->session->set_userdata("query", "SELECT players.id, players.name, players.image FROM players INNER JOIN genders ON genders.id = players.gender_id INNER JOIN sports ON sports.id = players.sport_id");
        }
        $result = $this->Player->show_all($this->session->userdata("query"));
        $view_data = array(
            "players" => $result,
            "genders" => $this->Gender->show_all(),
            "sports" => $this->Sport->show_all()
        );
        $this->load->view("players/index", $view_data);
    }
    public function show()
    {
        $this->load->model("Player");
        $input = $this->input->post(NULL, TRUE);
        $result = $this->Player->create_query($input);
        $this->session->set_userdata("query", $result);
        redirect("/");
    }
}
?>