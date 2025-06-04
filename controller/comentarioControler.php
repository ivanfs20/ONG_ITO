<?php
include_once("../model/Comentarios.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nIdUsuario']) && isset($_POST['testimonio'])) {
        $nIdUsuario = intval($_POST['nIdUsuario']);
        $testimonio = trim($_POST['testimonio']);

        $oComentario = new Comentarios();
        $oComentario->setnIdUsuario($nIdUsuario);
        $oComentario->setSComentario($testimonio);
        $oComentario->setBStatus(0);

        $resultado = $oComentario->create();

        if ($resultado) {
            // Redirigir con éxito
            header("Location: ../view/usuariodonaciones.php");
        } else {
            // Redirigir con error
            header("Location: ../view/error.php");
        }
    } else {
        // Redirigir si faltan datos
        header("Location: ../view/error.php");
    }
} else {
    // Redirigir si no es una solicitud POST
    header("Location: ../view/error.php");
}
?>  