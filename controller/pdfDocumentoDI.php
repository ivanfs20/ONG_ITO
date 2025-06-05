<?php
require('../lib/fpdf/fpdf.php'); //ruta de la libreria externa para crear un pdf

require_once '../model/Usuario.php';
session_start();
$bSession = false;
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bSession = true;
} else {
    $oUsuario = null;
    $bSession = false;
}

if ($oUsuario != null && $oUsuario->getsRol() == "administrador") {

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

    $pdf->Image('../view/media/imagen_logo.png', 140, 10, 70); //Logo de la ONG
    $pdf->Ln(10);

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 12);
    //RFC
    $pdf->Cell(40,10,utf8_decode('RFC: 30DIT0001V')); //RFC de la ONG
    $pdf->Ln(7);
    //Domicilio Físcal
    $pdf->Cell(40,10,utf8_decode('Domicilio Físcal: Oriente 9, 94320 Orizaba, Veracruz-llave · 11 km')); //Domicilio de la ONG
    $pdf->Ln(7);
    //Correo electrónico
    $pdf->Cell(40,10,utf8_decode('Correo: donativositorizaba@gmail.com')); //Correo de la ONG
    $pdf->Ln(7);
    //Teléfono
    $pdf->Cell(40,10,utf8_decode('Teléfono: (272) 725-7056')); //Telefono de la ONG
    $pdf->Ln(7);
    //Autorización para recibir donativos deducibles:
    $pdf->Cell(40,10,utf8_decode('Autorización: Oficio 400-02-00-2025-12345 del 10 de enero de 2025')); //Autorización de la ONG
    $pdf->Ln(14);
    //RECIBO DE DONTATIVO DEDUCIBLE -> ENCABEZADO
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(40,10, utf8_decode('RECIBO DE DONATIVO DEDUCIBLE'));
    $pdf->Ln(15);


// --- DATOS DEL DONANTE -> TITULO
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40,10,utf8_decode('DATOS DEL DONANTE'));
    $pdf->Ln(7);

    $pdf->SetFont('Arial', 'B', 10);
    //Nombre del Donante
    $pdf->Cell(40,10,utf8_decode('Nombre del Donante: '.$_POST['nombre_donador']));
    $pdf->Ln(7);
    //RFC del donante
    $pdf->Cell(40,10,utf8_decode('RFC del donante: '.$_POST['rfc_donador']));
    $pdf->Ln(7);
    //Domicilio del Donante
    $pdf->Cell(40,10,utf8_decode('Domicilio: '.$_POST['domicilio_donador']));
    $pdf->Ln(15);

// --- DATOS DEL DONATIVO -> TITULO
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40,10,utf8_decode('DATOS DEL DONATIVO'));
    $pdf->Ln(7);

    $pdf->SetFont('Arial', 'B', 10);
    //Folio
    $pdf->Cell(40,10,utf8_decode('Folio: '.$_POST['folio']));
    $pdf->Ln(7);
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d');
    //Fecha de emision
    $pdf->Cell(40,10,utf8_decode('Fecha de emisión: '.$fecha));
    $pdf->Ln(7);
    //Importe recibido
    $pdf->Cell(40,10,utf8_decode('Importe recibido: $'.$_POST['amount']));
    $pdf->Ln(7);
    //Forma de pago
    $pdf->Cell(40,10,utf8_decode('Método de pago: '.$_POST['metodo_pago']));
    $pdf->Ln(7);
    //Numero de operación o referencia bancaria
    $pdf->Cell(40,10,utf8_decode('Numero de operación o referencia bancaria: 1-4468005')); //Referencia bancaria
    $pdf->Ln(7);

    include_once("../model/Beneficiario.php");
    $oBeneficiario = new Beneficiario();
    $oBeneficiarioRecuperado = $oBeneficiario->getAllByIdBeneficiario($_POST['beneficiario']);
    $sNombreBeneficiario = $oBeneficiarioRecuperado->getsName();
    //Concepto
    $pdf->Cell(40,10,utf8_decode('Concepto: '.$sNombreBeneficiario));
    $pdf->Ln(16);


// --- LEYENDA FISCAL OBLIGATORIA -> TITULO
    //Texto leyenda
    $pdf->MultiCell(0,10,utf8_decode('"Este comprobante es deducible de impuestos conforme a lo dispuesto por los artículos 25 fracción VI, 27 fracción I de la Ley del ISR y 134 del Reglamento de la Ley del ISR. La donataria cuenta con autorización vigente para recibir donativos deducibles conforme al Art. 82 de la Ley del ISR."'));
    $pdf->Ln(5);
    $pdf->Cell(40,10,utf8_decode('"No se otorga ningún bien o servicio a cambio de este donativo."'));
    $pdf->Ln(16);

// --- Firma o sello digital del responsable de la ONG -> TITULO
    $pdf->Image('../view/media/firmacode.png', 70, 230, 70); //Imagen de la firma del encargado o responsable de la ONG
    $pdf->Cell(0,10,utf8_decode('Líder del Proyecto'),0,1,'C'); //Cargo que desempeña el encargado o responsable de la ONG
    $pdf->Ln(20);
    $pdf->Cell(0,10,utf8_decode('Carlos Iván Flores Sánchez'),0,1, 'C'); //Nombre del encargado o responsable de la ONG
    $pdf->Ln(7);

    $filename = '../documents/reciboDonativo_' . $_POST['nombre_donador'].'_'.$_POST['folio']. '.pdf';
    $pdf->Output('F', $filename); //lo descarga en el servidor y no lo muestra
    header("Location: ../view/popdigitalPDF.php?msg=descargado");
    exit();

// Descargar el archivo
//$pdf->Output('D',$filename); //se muestra y el usuario lo debe de descargar
//$pdf->Output('D', 'reciboDonativo.pdf'); se descarga automaticamente
}
?>
