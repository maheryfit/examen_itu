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
        $this->data["session"] = $this->session->user;
        $this->load->view("admin-page/template-admin", $this->data);
    }

    public function login() {
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
<<<<<<< Updated upstream
            $rep = $this->Login_model->logAsAdmin($email,$motdepasse);
            if($rep == false){
                echo "tsy misy ";
                redirect(site_url("admin_controller/login"));             
            } 
                
            $this->session->set_userdata("admin",$rep);
=======
            $rep = $this->Utilisateur->checkLogin($data);
            redirect(site_url("admin_controller/index"));
>>>>>>> Stashed changes
        } catch (Exception $e) {
            echo $data["email"] . " , " .$data["motdepasse"];
            echo "Erreur : ".$e->getMessage();
<<<<<<< Updated upstream
        }
        redirect(site_url("Admin_controller/index"));
=======
            // redirect(site_url("admin_controller/login"));
        }



>>>>>>> Stashed changes
    }
}