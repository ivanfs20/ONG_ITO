<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$img = "../view/media/sdislike.png"; // Default image for error
$text = "Ocurrió un error";

if ($msg === "agregado") {
    $img = "../view/media/slike.png";
    $text = "Proyecto Agregado";
} elseif ($msg === "modificado") {
    $img = "../view/media/slike.png";
    $text = "Proyecto Modificado";
} elseif ($msg === "borrado") {
    $img = "../view/media/slike.png";
    $text = "Proyecto Eliminado";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PopProyecto</title>
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
                redireccion: "gestiondeproyecto.php",
                imagen: "<?php echo $img; ?>"
            });
        });
    </script>
</body>

</html>