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
                redirect(site_url("front_controller/login"));             
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

}
