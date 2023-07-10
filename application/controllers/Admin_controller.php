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
}