<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view("admin-page/template-admin/sidebar");
   $this->load->view("admin-page/template-admin/navbar");
   if (!empty($page)) {
      $this->load->view("admin-page/" . $page);
   }
   $this->load->view("admin-page/template-admin/footer");
?>