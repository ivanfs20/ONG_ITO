<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$img = "../view/media/sdislike.png"; // Default image for error
$text = "Ocurrió un error";

if ($msg === "confirmado") {
    $img = "../view/media/confirmarDonacion.png";
    $text = "SE HA CONFIRMADO LA DONACION";
} elseif ($msg === "no confirmado") {
    $img = "../view/media/confirmarDonacion.png";
    $text = "NO SE HA CONFIRMADO LA DONACIÓN.";
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EMAIL</title>
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