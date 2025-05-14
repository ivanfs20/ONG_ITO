<?php
/**
 * Como es un componente reutilizable en varias vistas y solo cambia el titulo, color, boton.
 * Se decidio hacerlo de esta manera y pasar las variables para no repetir tanto hero innceseario
 */
function mostrarHero($titulo, $subtitulo, $boton = "")
{
    ?>
    <!--  Autor: Edwin Ariel Ramos Alvarez  -->
    <section class="hero">
        <div class="hero-contenido">
            <h1 class="hero-titulo">
                <?php echo htmlspecialchars($titulo); ?>
            </h1>
            <p class="hero-subtitulo">
                <?php echo htmlspecialchars($subtitulo); ?>
            </p>
            <?php if (!empty($boton)): ?>
                <a href="<?php echo htmlspecialchars($boton['url']); ?>" class="hero-boton">
                    <?php echo htmlspecialchars($boton['texto']); ?>
                </a>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
?>