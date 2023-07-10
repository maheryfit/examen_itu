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
}
