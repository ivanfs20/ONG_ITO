<?php
/*************************************************************/
/* Archivo:  sesionusuario.php
 * Objetivo: Menu principal de un usuario
 * Autor: Uriel Vallejo Xicalhua
 *************************************************************/
$customStyles = '<link rel="stylesheet" href="../view/css/vistas/sesionusuario.css">'; #cargamos el estilo en especifico de sesionusuario.php
$customScript = '<script src="../view/js/script1.js"></script>'; #cargamos el script
include_once("modules/header.html");  # Incluye <head> y apertura de <body>
include_once("modules/navbar.php");   # Navbar
include_once("../model/Usuario.php");
session_start();
$bSession = false;
if (isset($_SESSION['usuario'])) {
    $oUsuario = $_SESSION["usuario"];
    $bSession = true;
    $nombre="Donador";

} else {
    $oUsuario = null;
    $bSession = false;
} 

if ($oUsuario != null) {

?>


<div class="banner">
¡Bienvenido, <?php echo  $oUsuario->getsNombreC();  ?>    </div>

    
  </header>

  <button class="donate-btn">¡Donar!</button>

  <main class="main-container">

    <?php
include_once("modules/aside.html"); # Aside
?>

    <section class="recommendations">
      <h2>Recomendadas para ti:</h2>

      <div class="card">
        <img src="https://via.placeholder.com/120x120" alt="Imagen 1" />
        <div>
          <h3>Espacios donde se forma el futuro</h3>
          <p>Con tu donación, ayudamos a remodelar salones de clase y brindar acceso a recursos necesarios.</p>
          <button class="donate-btn">Ver campaña solidaria</button>
        </div>
      </div>

      <div class="card">
        <img src="https://via.placeholder.com/120x120" alt="Imagen 2" />
        <div>
          <h3>El conocimiento necesita práctica</h3>
          <p>Apoya con herramientas, insumos y recursos didácticos para estudiantes en formación.</p>
          <button class="donate-btn">Ver campaña solidaria</button>
        </div>
      </div>

      <div class="card">
        <img src="https://via.placeholder.com/120x120" alt="Imagen 3" />
        <div>
          <h3>Herramientas para enseñar mejor</h3>
          <p>Donaciones que permiten a los docentes acceder a mejores medios de enseñanza.</p>
          <button class="donate-btn">Ver campaña solidaria</button>
        </div>
      </div>

      <div class="card">
        <img src="https://via.placeholder.com/120x120" alt="Imagen 4" />
        <div>
          <h3>Conservar el espacio en condiciones dignas</h3>
          <p>Materiales, infraestructura y limpieza que permiten un entorno de calidad para aprender.</p>
          <button class="donate-btn">Ver campaña solidaria</button>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <p>Gracias por ser parte del cambio, <span class="username">[nombre]</span>. Cada donación tuya deja una huella real. ¿Nos ayudas una vez más a transformar vidas?</p>
    <button class="donate-btn">Seguir colaborando</button>
  </footer>

<?php
}{
  include_once("loginUrgente.php");
}
include_once("modules/footer.html"); # Footer y cierre de HTML

?>
