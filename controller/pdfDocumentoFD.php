<?php
require('../lib/fpdf/fpdf.php'); //ruta de la libreria externa para crear un pdf
require_once '../model/Usuario.php';
//session_start();
$bSession = false;
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bSession = true;
} else {
    $oUsuario = null;
    $bSession = false;
}

//if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 25);
$pdf->SetTextColor(0, 33, 71);
$pdf->Ln(10);

// --- Encabezado ONG -> TITULO
    $pdf->Cell(40, 10, utf8_decode('DONATIVOS'), 0, 0);
    $pdf->Cell(15, 10, '', 0, 0);
    $pdf->SetTextColor(255, 221, 0);
    $pdf->Cell(100,10,utf8_decode('ITORIZABA'),0,0);

    $pdf->Image('../view/media/imagen_logo.png', 140, 10, 70);
    $pdf->Ln(20);

    //--FOLIO -> Titulo
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, utf8_decode('FOLIO DE PAGO'), 0, 0);
    date_default_timezone_set('America/Mexico_City');
    $fecha = date("Y-m-d H:i:s");
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Fecha/Hora: '.$_POST['fecha']), 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Monto: $'.$_POST['amount']), 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Numero de cuenta: 1-4468005'), 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Nombre del pagador: '.$_POST['nombre_donador']), 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Beneficiario: TECNOLOGICO NACIONAL DE MEXICO/I.T. ORIZABA'), 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Concepto: '.$_POST['beneficiario']), 0, 0);


    $pdf->Ln(20);

    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('----------------------------------'), 0, 0, 'C');

    $pdf->SetTextColor(255, 0, 0);


    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode($_POST['folio']), 0, 0, 'C');

    $pdf->Ln(20);

    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(0, 10, utf8_decode('----------------------------------'), 0, 0, 'C');


    $pdf->Ln(40);
    $pdf->SetTextColor(255, 0, 0);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('¡IMPORTANTE : VALIDACIÓN DE PAGO!'), 0, 0);

    $pdf->SetTextColor(0, 0, 0);

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('Para que el pago sea validado correctamente, se deberá:'), 0, 0);
    

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, utf8_decode('- El pago se verá reflejado en un plazo máximo de 48 horas.'), 0, 0);
    

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode('- En caso de no pagar el comprobante en ese tiempo, el donativo será anulado.'), 0, 0);
    

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(150, 10, utf8_decode('- En caso de error o dudas, favor de comunicarse al correo: donativositorizaba@gmail donde con gusto le brindaremos asistencia.'), 0, 0);
    


// Descargar el archivo
$pdf->Output('I', 'reciboDonativo_'.$_POST['correo_donador'].'_'.$_POST['nombre_donador'].'pdf'); //se muestra y el usuario lo debe de descargar
//$pdf->Output('D', 'reciboDonativo.pdf'); se descarga automaticamente
//}
?>
