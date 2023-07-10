<?php

class Admin_controller extends CI_Controller {
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
    }

    public function index() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "index";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function login() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "login";
        $this->load->view("admin-page/template-front", $this->data);
    }


    public function insererActivite() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "insertion-sport";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function insererAliment() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "insertion-aliment";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function log(){
        $this->load->model("Utilisateur");
        $data = $this->input->post();

        try {
            $rep = $this->Utilisateur->checkLogin($data);
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
            // redirect(base_url("admin_controller/register"));
        }

        // redirect(base_url("index.php/admin_controller/index"));


    }
}