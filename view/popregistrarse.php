<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$img = "../view/media/sdislike.png"; // Default image for error
$text = "Ocurrió un error";

if ($msg === "mayor") {
    $img = "../view/media/mayor.png";
    $text = "La contraseña tiene que tener almenos 10 digitos.";
} elseif ($msg === "mayuscula") {
    $img = "../view/media/mayuscula.png";
    $text = "La contraseña tiene que tener al menos una mayuscula.";
} elseif ($msg === "iguales") {
    $img = "../view/media/iguales.png";
    $text = "Confirma que las contraseñas son iguales.";
} elseif ($msg === "correo") {
    $img = "../view/media/correo.png";
    $text = "Que el correo ya fue utilizado";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PopRegistrarse</title>
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
                redireccion: "iniciarsesion.php",
                imagen: "<?php echo $img; ?>"
            });
        });
    </script>
</body>

</html>