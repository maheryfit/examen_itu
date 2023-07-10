<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view("front-page/template-front/sidebar");
<<<<<<< Updated upstream
   $this->load->view("front-page/template-front/navbar");
=======
>>>>>>> Stashed changes
   if (!empty($page)) {
      $this->load->view("front-page/" . $page);
   }
   $this->load->view("front-page/template-front/footer");
?>