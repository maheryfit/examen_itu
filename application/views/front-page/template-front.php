<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
<<<<<<< HEAD
   $this->load->view("front-page/template-front/navbar");
=======
   $this->load->view("front-page/template-front/sidebar");
>>>>>>> 3b62a42732a6b030f2dcdb08adf5b2edb72891ee
   if (!empty($page)) {
      $this->load->view("front-page/" . $page);
   }
   $this->load->view("front-page/template-front/footer");
?>