<?php

class Sessioncontroller extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checksession($sessionName,$redirect_page)
    {
        if(! $this->session->has_userdata($sessionName)) redirect($redirect_page);
    }

}