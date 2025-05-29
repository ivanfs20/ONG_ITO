<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../lib/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'donativositorizaba@gmail.com'; //Correo de la ONG
    $mail->Password   = 'alvh jbqd khti cpzp';       //Contraseña de aplicación para ONG
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('donativositorizaba@gmail.com', 'ADMINISTRADOR'); //Correo de ONG
    $mail->addAddress($_POST['email'],$_POST['nombre']); //Correo del usuario a quien vamos a enviar un email
    $mail->CharSet = 'UTF-8';
    $image = "../view/media/ITO.png";
    $mail->addAttachment($image);

    $mail->isHTML(true);
    $mail->Subject = 'SUSCRIPCION - DONATIVOSITORIZABA - ¡PROXIMAMENTE!'; //Asunto
    $mail->Body    = '<strong><h1>¡SE PARTE DE LA FAMILIA BUHOS Y ENTERATE DE TODAS LA NOTICIAS!</h1></strong><p>Este es un correo de suscripción que se encuentra en fase de desarrollo, porque tu tambien eres parte de la familia <strong>Buhos</strong>.</p>'; //Cuerpo

    $mail->send();
    header("Location: ../index.php");
    exit();
} catch (Exception $e) {
    echo "❌ Error al enviar el correo: {$mail->ErrorInfo}";
}

?>