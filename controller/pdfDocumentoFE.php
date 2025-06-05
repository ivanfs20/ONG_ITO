<?php
require('../lib/fpdf/fpdf.php'); //ruta de la libreria externa para crear un pdf

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 25);
$pdf->SetTextColor(0, 33, 71);
$pdf->Ln(10);

// --- Encabezado ONG -> TITULO
    $pdf->Cell(40, 10, utf8_decode('DONATIVOS'), 0, 0); //Titulo de la ONG
    $pdf->Cell(15, 10, '', 0, 0);
    $pdf->SetTextColor(255, 221, 0);
    $pdf->Cell(50,10,utf8_decode('ITORIZABA'),0,0); //Titulo de la ONG

    $pdf->Image('../view/media/imagen_logo.png', 140, 10, 70); //Imagen-Logo de la ONG
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('----------------------'), 0, 0);


    $pdf->Ln(10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(100, 10, utf8_decode('GUIA DE ENVIO'), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetTextColor(255, 221, 0);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('----------------------'), 0, 0);

    $pdf->Ln(30);
    $pdf->SetTextColor(0, 33, 71);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('-------------------------------------------------------------'), 0, 0,'C');

    $pdf->Ln(10);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('DESTINATARIO:'), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Nombre: INSTITUTO TECNOLOGICO DE ORIZABA'), 0, 0); //Nombre de la institución

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Dirección: Oriente 9, 94320 Orizaba, Veracruz-llave · 11 km'), 0, 0); //Dirección de la ONG

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Tel: (272) 725-7056'), 0, 0); //Numero telefonico de la ONG


    $pdf->Ln(10);
    $pdf->SetTextColor(0, 33, 71);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('-------------------------------------------------------------'), 0, 0,'C');


    $pdf->Ln(30);

    
    
    $pdf->SetTextColor(0, 33, 71);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('-------------------------------------------------------------'), 0, 0,'C');


    $pdf->Ln(10);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('REMITENTE:'), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Nombre: '.$_POST['usuario']), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Dirección: '.$_POST['direccion']), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Correo: '.$_POST['correo']), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Servicio: Estándar [   ]terrestre [   ]aereo'), 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d');
    $pdf->Cell(0, 10, utf8_decode('Fecha: '.$fecha), 0, 0);
    $pdf->Ln(10);

    $pdf->SetTextColor(0, 33, 71);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('-------------------------------------------------------------'), 0, 0,'C');


    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Instrucciones: Entregar en horario de oficina'), 0, 0);
    $pdf->SetTextColor(255, 0, 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('------------------------------------------------------------------'), 0, 0);

// Descargar el archivo
$pdf->Output('I', 'reciboDonativo'.trim($_POST['usuario']).'.pdf'); //se muestra y el usuario lo debe de descargar
//$pdf->Output('D', 'reciboDonativo.pdf'); se descarga automaticamente

?>
