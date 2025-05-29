<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$img = "../view/media/sdislike.png"; // Default image for error
$text = "Ocurrió un error";

if ($msg === "agregado") {
    $img = "../view/media/slike.png";
    $text = "Usuario Agregado";
} elseif ($msg === "modificado") {
    $img = "../view/media/slike.png";
    $text = "Usuario Modificado";
} elseif ($msg === "borrado") {
    $img = "../view/media/slike.png";
    $text = "Usuario Eliminado";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PopUsuario</title>
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
                redireccion: "gestiondeusuarios.php",
                imagen: "<?php echo $img; ?>"
            });
        });
    </script>
</body>

</html>