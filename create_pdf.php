<?php

//create_pdf.php


include('pdf.php');

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
{
 $file_name = 'GraficaPrueba.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css
 <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    

    ">';
 $html .= $_POST["hidden_html"];

 $pdf = new Pdf();
 $pdf->load_html($html);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => true));
}

?>