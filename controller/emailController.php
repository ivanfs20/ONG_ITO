



    <?php
require '../lib/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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


    

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'donativositorizaba@gmail.com'; //Correo de la ONG
    $mail->Password   = 'alvh jbqd khti cpzp';       //Contraseña de aplicación para ONG
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('donativositorizaba@gmail.com', 'ADMINISTRADOR'); //Correo de ONG y nombre del administrador
    $mail->addAddress($_POST['correo_donador'],$_POST['nombre_donador']); //Correo del usuario a quien vamos a enviar un email
    $userProfile = getenv("USERPROFILE") ?: $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'];
    $downloadPath = $userProfile . "\\Downloads\\../documents/reciboDonativo_".$_POST['nombre_donador'].".pdf";
    $mail->addAttachment("../documents/reciboDonativo_".$_POST['nombre_donador']."_".$_POST['folio'].".pdf");
    $mail->isHTML(true);
    $mail->Subject = 'RECIBO DE DONATIVO'; //Asunto
    $mail->Body    = '<strong><h1>¡NUESTROS ALUMNOS AGRADECEN TU DONATIVO!</h1></strong><p>Este es un correo de validación de tu donación, porque tu tambien eres parte de la familia <strong>Buhos</strong>.</p>'; //Cuerpo

    $mail->send();
    header("Location: ../view/popemail.php?msg=enviado");
} catch (Exception $e) {
    echo "❌ Error al enviar el correo: {$mail->ErrorInfo}";
    header("Location: ../view/popemail.php?msg=no enviado");

}
}
?>


</body>
</html>
