<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   if (!empty($page)) {
      $this->load->view("front-page/" . $page);
   }
?>