<?php
include("Session_controller.php");

class Front_controller extends Session_controller
{
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
    }

    public function index() {
        $this->data["title"] = "Front-Office";
        $this->data["page"] = "profile";
        $this->data["session"] = $this->session->user;
        $this->load->view("front-page/template-front", $this->data);
    }

    public function login() {
        if ($this->input->get("error") != null) {
            $this->data["error"] = $this->input->get("error");
        }
        else {
            $this->data["error"] = null;
        }
        $this->data["title"] = "Login client";
        $this->data["page"] = "login";
        $this->load->view("front-page/template-login", $this->data);
    }

    public function register() {
        $this->data["title"] = "Login client";
        $this->data["page"] = "register";
        $this->load->view("front-page/template-register", $this->data);
    }

    public function log(){
        $this->load->model("Login_model");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Login_model->log($email,$motdepasse);
            if($rep == false){
                echo "tsy misy ";
                redirect(site_url("Front_controller/login?error=Vérifier votre email/mot de passe"));             
            } 
                
            $this->session->set_userdata("user",$rep);
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(site_url("Front_controller/index"));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("Front_controller/login"));
    }

    public function inscription(){
        $this->load->model("Login_model");

        $nom = $this->input->post("nom");
        $prenom = $this->input->post("prenom");
        $datenaissance = $this->input->post("datenaissance");
        $genre = $this->input->post("genre");
        $email = $this->input->post("email");
        $password = $this->input->post("motdepasse");

        $this->Login_model->insertuser($nom,$prenom,$datenaissance,$genre,$email,$password);

        try {
            $rep = $this->Login_model->log($email,$password);
            if($rep == false){
                redirect(site_url("Front_controller/login?error=Vérifier votre email/mot de passe"));             
            } 
                
            $this->session->set_userdata("user",$rep);
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        
        redirect(site_url("front_controller/index"));
    }

    public function donnee() {
        $this->data["title"] = "Front-Office";
        $this->data["page"] = "donnee";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->view("front-page/template-front", $this->data);
    }

}
