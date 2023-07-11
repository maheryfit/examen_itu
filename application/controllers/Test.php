<?php

class Test extends CI_Controller
{
    public function index(){
        $this->load->model("Profil");
        $post = array(
            "idutilisateur" => 1,
            "poids"=>75,
            "taille"=>175,
            "poidsobjectif"=>70,
            "idcategorieregime" => 2,
            "dateprofil" => "2023-07-12"
        );
        $test = $this->Profil->get_suggestion($post);
        var_dump($test);
    }
}