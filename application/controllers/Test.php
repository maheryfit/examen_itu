<?php

class Test extends CI_Controller
{
    public function index(){
        $this->load->model("Regime");
        $post = array(
            "idcategorieregime" => 2,
            "montant"=>20000,
            "duree"=>3,
            "poids"=>70
        );
        $test = $this->Regime->insert($post);
        var_dump($test);
    }
}