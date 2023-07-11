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


    public function insererActivite() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "insertion-sport";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function insererAliment() {
        $this->checkSession("admin", site_url("Admin_controller/login"));
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "insertion-aliment";
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function log(){
        $this->load->model("Login_model");
        $email = $this->input->post("email");
        $motdepasse = $this->input->post("motdepasse");

        try {
            $rep = $this->Login_model->logAsAdmin($email,$motdepasse);
            if($rep == false){
                echo "tsy misy ";
                redirect(site_url("admin_controller/login?error=Vérifier votre email/mot de passe"));             
            } 
                
            $this->session->set_userdata("admin",$rep);
            redirect(site_url("admin_controller/index"));
        } catch (Exception $e) {
            echo "Erreur : ".$e->getMessage();
        }
        redirect(base_url("Admin_controller/index"));
    }

    public function creerRegime() {
        $this->data["title"] = "Administrateur";
        $this->data["page"] = "creationRegime";
        $this->load->view("admin-page/template-admin", $this->data);
    }
}