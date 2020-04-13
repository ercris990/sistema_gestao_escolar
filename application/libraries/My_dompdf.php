<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('_assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class My_dompdf
{
    protected $ci;
    function __construct()
    {
        // parent::__construct();
        $this->ci =& get_instance();
    }
    /*                  GERAR PDF VERTICAL   
    =======================================================================================================================================*/
    public function gerar_pdf($view, $dados = array(), $papel = 'A4', $orientacao = 'portrait') //Orientacao: portrait / landscape
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $dados, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($papel, $orientacao);
        /*  Converter o HTML em PDF */
        $dompdf->render();
        $dompdf->stream(date('d-m-Y-H-i-s').".pdf", array("Attachment" => FALSE));
    }
    /*                  GERAR PDF HORIZONTAL   
    =======================================================================================================================================*/
    public function gerar_pdf_landscape($view, $dados = array(), $papel = 'A4', $orientacao = 'landscape') //Orientacao: portrait / landscape
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $dados, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($papel, $orientacao);
        /*  Converter o HTML em PDF */
        $dompdf->render();
        $dompdf->stream(date('d-m-Y-H-i-s').".pdf", array("Attachment" => FALSE));
    }
}