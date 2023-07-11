<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/dompdf/autoload.inc.php';


class Pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dompdf = new Dompdf();

        $html = $this->load->view('pdf_template', [], true);
        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream('output.pdf', array('Attachment' => 0));
    //     $pdf_content = $dompdf->output();
    //     file_put_contents('chemin/vers/votre/fichier.pdf', $pdf_content);
    }
}
