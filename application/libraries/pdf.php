<?php

use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{
    function createPdf($html, $filename = '', $download="TRUE", $paper='A4', $orientation = 'landscape'){
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download){
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        }else{
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
        }

    }
}
