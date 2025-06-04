<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$img = "../view/media/sdislike.png"; // Default image for error
$text = "Ocurrió un error";

if ($msg === "descargado") {
    $img = "../view/media/pdf.png";
    $text = "Haz descargado correctamente el PDF deducible";
} elseif ($msg === "no desgarcado") {
    $img = "../view/media/pdf.png";
    $text = "El material no ha sido recibido.";
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PopDigitalPDF</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }
    </style>
    <script src="js/pop.js"></script>
</head>

<body>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            mostrarMensaje({
                mensaje: "<?php echo addslashes($text); ?>",
                redireccion: "gestiondigital.php",
                imagen: "<?php echo $img; ?>"
            });
        });
    </script>
</body>

</html>