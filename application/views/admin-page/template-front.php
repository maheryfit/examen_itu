<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view("admin-page/template-login/header");
   if (!empty($page)) {
      $this->load->view("admin-page/" . $page);
   }
   $this->load->view("admin-page/template-login/footer");
?>