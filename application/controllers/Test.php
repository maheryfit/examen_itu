<?php

class Test extends CI_Controller
{
    public function index(){
        $this->load->model("Activite");
        $post = array(
            "idcategorieregime" => 2,
            "montant"=>20000,
            "duree"=>3,
            "poids"=>70
        );
        $test = $this->Activite->select_by_id(1)->get_categorie_regime();
        var_dump($test);
    }
}