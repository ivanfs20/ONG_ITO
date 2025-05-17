document.addEventListener('DOMContentLoaded', function () {
    const selectores = document.querySelectorAll('.selector-opcion, .cambiar-formulario');

    const mostrarFormulario = (formularioId) => {
        // 1. Ocultar todos los formularios
        document.querySelectorAll('.formulario').forEach(form => {
            form.classList.remove('formulario-activo');
            form.style.opacity = '0';
            form.style.display = 'none';
        });

        // 2. Mostrar formulario seleccionado con animación
        const formulario = document.querySelector(`#${formularioId}`);
        formulario.style.display = 'block';
        setTimeout(() => {
            formulario.style.opacity = '1';
            formulario.classList.add('formulario-activo');
        }, 10);

        // 3. Actualizar estado de los botones
        document.querySelectorAll('.selector-opcion').forEach(boton => {
            boton.classList.remove('activo');
            if (boton.dataset.formulario === formularioId.replace('form-', '')) {
                boton.classList.add('activo');
            }
        });
    };

    // 4. Configurar event listeners
    selectores.forEach(elemento => {
        elemento.addEventListener('click', function (e) {
            e.preventDefault();
            mostrarFormulario(`form-${this.dataset.formulario}`);
        });
    });

    // 5. Inicializar con formulario de registro
    mostrarFormulario('form-registro');
});