<?php
use \Mpdf\Mpdf;

if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $filename = 'document.pdf', $output_mode = 'I') {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, $output_mode);
    }
}
