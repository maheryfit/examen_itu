<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view("front-page/template-login/header");
   if (!empty($page)) {
      $this->load->view("front-page/" . $page);
   }
   $this->load->view("front-page/template-login/footer");
?>