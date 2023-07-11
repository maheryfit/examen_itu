<?php 
    require_once APPPATH . 'libraries/fpdf/fpdf.php';
    class PdfController extends CI_Controller{
        public function index() {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->Ln();
        
            $this->load->model('Regime');
            $regimes = $this->Regime->select();

            $pdf->SetFont('Arial', 'B', 15);
            $pdf->Cell(0, 10, 'Liste Regime', 0, 1);
        
            if (!empty($regimes)) {
                $pdf->SetFillColor(90, 47, 39);;
                $pdf->Cell(60, 15, 'NomRegime', 1, 0, 'L', true);
                $pdf->Cell(50, 15, 'Montant', 1, 0, 'L', true);
                $pdf->Cell(30, 15, 'Duree', 1, 0, 'L', true);
                $pdf->Cell(30, 15, 'poids', 1, 0, 'L', true);
                $pdf->Ln();
        
                $pdf->SetFont('Arial', '', 13);
                foreach ($regimes as $regime) {
                    $pdf->Cell(60, 15, $regime->get_nom_regime(), 1);
                    $pdf->Cell(50, 15, $regime->get_montant()."Ar", 1);
                    $pdf->Cell(30, 15, $regime->get_duree()." jour(s)", 1);
                    $pdf->Cell(30, 15, $regime->get_poids()."kg", 1);
                    $pdf->Ln();
                }
            } else {
                $pdf->SetFont('Arial', 'B', 15);
                $pdf->Cell(90, 30, 'Aucun regime trouve', 0, 0, 'C');
            }
        
            $pdf->Output();
        }
        
   }
?>