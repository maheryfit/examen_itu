<?php

class Front_controller extends CI_Controller
{
    private $data;
    public function __construct() {
        parent::__construct();
        $this->data = array();
    }

    public function index() {
        $this->data["title"] = "Front-Office";
        $this->data["page"] = "profile";
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
}
