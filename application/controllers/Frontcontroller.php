<?php
include("Sessioncontroller.php");

class Frontcontroller extends Sessioncontroller
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
        $this->load->model("Loginmodel");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Loginmodel->log($email,$motdepasse);
            if($rep == false){
                redirect(site_url("frontcontroller/login?error=Vérifier votre email/mot de passe"));
            } 
                
            $this->session->set_userdata("user",$rep);
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(site_url("frontcontroller/index"));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("frontcontroller/login"));
    }

    public function inscription(){
        $this->load->model("Loginmodel");

        $nom = $this->input->post("nom");
        $prenom = $this->input->post("prenom");
        $datenaissance = $this->input->post("datenaissance");
        $genre = $this->input->post("genre");
        $email = $this->input->post("email");
        $password = $this->input->post("motdepasse");

        $this->Loginmodel->insertuser($nom,$prenom,$datenaissance,$genre,$email,$password);

        try {
            $rep = $this->Loginmodel->log($email,$password);
            if($rep == false){
                redirect(site_url("frontcontroller/login?error=Vérifier votre email/mot de passe"));
            } 
                
            $this->session->set_userdata("user",$rep);
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        
        redirect(site_url("frontcontroller/index"));
    }

    public function donnee() {
        $this->checkSession("user", site_url("frontcontroller/login"));
        $this->data["session"] = $this->session->user;
        $this->data["title"] = "Front-Office";
        $this->data["page"] = "donnee";
        $this->load->model("Categorieregime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->view("front-page/template-front", $this->data);
    }


    public function suggestion(){
        $this->checkSession("user", site_url("frontcontroller/login"));
        $this->data["session"] = $this->session->user;
        $this->data["title"] = "Front-Office";
        $this->data["page"] = "suggestion";

        $this->load->model("Activite");
        $this->load->model("Profil");

        $post = array(
            "idutilisateur" => $this->session->user["idutilisateur"],
            "poids"=>$this->input->post("poids"),
            "taille"=>$this->input->post("taille"),
            "poidsobjectif"=>$this->input->post("poidsobjectif"),
            "idcategorieregime" => $this->input->post("idcategorieregime"),
            "dateprofil" => $this->input->post("dateprofil")
        );

        $this->data["suggestion"] = $this->Profil->get_suggestion($post);
        $this->load->view("front-page/template-front", $this->data);

    }

}
