<?php
include("Session_controller.php");

class Admin_controller extends Session_controller {
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
        
    }
    
    public function index() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "index";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function login() {
        if ($this->input->get("error") != null) {
            $this->data["error"] = $this->input->get("error");
        }
        else {
            $this->data["error"] = null;
        }
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "login";
        $this->load->view("admin-page/template-front", $this->data);
    }


    

    public function log(){
        $this->load->model("Login_model");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Login_model->logAsAdmin($email,$motdepasse);
            if($rep == false){
                redirect(site_url("admin_controller/login?error=Vérifier votre email/mot de passe"));            
            } 
                
            $this->session->set_userdata("admin",$rep);
            redirect(site_url("admin_controller/index"));
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(base_url("Admin_controller/index"));
    }

    public function creeregime() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "creationRegime";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function listeregime() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "listeRegime";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function aliment() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "aliment";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function activite() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "activite";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Activite");
        $this->data["prise"] = $this->Activite->selectbyCat(1);
        $this->data["perte"] = $this->Activite->selectbyCat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function regime() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "regime";
        $this->load->model("Categorie_regime");
        $this->data["categorie"] = $this->Categorie_regime->select();
        $this->load->model("Aliment");
        $this->data["prise"] = $this->Aliment->selectbyCat(1);
        $this->data["perte"] = $this->Aliment->selectbyCat(2);
        $this->load->model("Activite");
        $this->data["aprise"] = $this->Activite->selectbyCat(1);
        $this->data["aperte"] = $this->Activite->selectbyCat(2);
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function insertaliment(){
        $this->load->model("Aliment");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Aliment->insertaliment($nom,$id);
        redirect(site_url("admin_controller/aliment"));              
    }

    public function insertactivite(){
        $this->load->model("Activite");
        $nom = $this->input->post("nom");
        $id = $this->input->post("idcategorie");
        $rep = $this->Activite->insertactivite($nom,$id);
        redirect(site_url("admin_controller/activite"));              
    }

}