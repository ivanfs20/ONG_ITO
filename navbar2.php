<!--  Autor: Edwin Ariel Ramos Alvarez  -->

<?php
    include_once('model/Usuario.php');   
    //session_start();
    $oUsuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:null;


    
     if($oUsuario!=null){
    $sRol = $oUsuario->getsRol();
    if($sRol=="administrador"){
?>
<nav class="navbar">
    <div class="navbar-logo">
        <span class="logo-line1">DONATIVOS</span>
        <span class="logo-line2">ITORIZADA</span>
    </div>

    <div class="nav-links">
        <a href="sesionadmin.php" class="nav-link">Inicio</a>
        <a href="gestiondedonaciones.php" class="nav-link">Donaciones</a>
        <a href="gestionpb.php" class="nav-link">Areas</a>
        <a href="gestiondeusuarios.php" class="nav-link">Usuarios</a>
        <a href="gestiondeproyecto.php" class="nav-link">Proyectos</a>
        <a href="gestiondebenefactor.php" class="nav-link">Beneficiarios</a>
        <a href="gestionmaterial.php" class="nav-link">Materiales</a>
        <a href="gestiondigital.php" class="nav-link">Digitales</a>
        <a href="iniciarsesion.php" class="nav-link login-link">Logout</a>
    </div>
</nav>


<?php
}else{
?>
<nav class="navbar">
    <div class="navbar-logo">
        <span class="logo-line1">DONATIVOS</span>
        <span class="logo-line2">ITORIZADA</span>
    </div>

    <div class="nav-links">
           
        <a href="campanas.php" class="nav-link">Campañas</a>   
        <a href="areasapoyo.php" class="nav-link">Áreas de trabajo</a>
         <a href="transparencia.php" class="nav-link">Transparencia</a>    
        <a href="sesionusuario.php" class="nav-link">Perfil</a>
        <a href="D1_Area.php" class="nav-link">Donar ahora</a>
        <a href="iniciarsesion.php" class="nav-link login-link">logout</a>
    </div>
</nav>

<?php
} 
    }
    else{
?>
     <nav class="navbar">
    <div class="navbar-logo">
        <span class="logo-line1">DONATIVOS</span>
        <span class="logo-line2">ITORIZADA</span>
    </div>

    <div class="nav-links">
        
        <a href="index.php" class="nav-link">Inicio</a>
        <a href="view/campanas.php" class="nav-link">Campañas</a>
        <a href="view/areasapoyo.php" class="nav-link">Áreas de trabajo</a>
        <a href="view/transparencia.php" class="nav-link">Transparencia</a>
        <a href="view/D1_Area.php" class="nav-link">Donar ahora</a>
        <a href="view/iniciarsesion.php" class="nav-link login-link">Login</a>
    </div>
</nav>   

<?php
    }
?>





<!--  Autor: Edwin Ariel Ramos Alvarez  -->
  <!--  Navegador Admin  -->
  <!--


-->

<!--  Autor: Edwin Ariel Ramos Alvarez  -->
  <!--  Navegador Usuario  -->
  <!--


-->