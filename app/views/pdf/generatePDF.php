<?php

    require_once __DIR__ . '/vendor/autoload.php';

    //load content on execute php
    include 'example1/index.html';
    $html = ob_get_clean();

    //load content from file
    $stylesheet = file_get_contents( __DIR__ . '/example1/style.css' );
    //$html = 

    //create pdf
    $mpdf = new mPDF('c', 'A4');

    //write pdf
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->writeHTML($html, 2);

    //asignate name
    $mpdf->Output();

/**/
    //load content on execute php
    //include 'index.php';
    //$html = ob_get_clean();
/**/