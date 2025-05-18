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

document.addEventListener('DOMContentLoaded', function () {
    const tarjetas = document.querySelectorAll('.area-card');
    const botonContinuar = document.querySelector('.boton-continuar');
    let areaSeleccionada = null;

    // seleccionamos un area para poder avanzar
    tarjetas.forEach(tarjeta => {
        tarjeta.addEventListener('click', function () {

            tarjetas.forEach(t => {
                t.classList.remove('seleccionada');
                t.querySelector('.area-button').textContent = "Quiero apoyar esta area";
            });

            //metemos dentro del boton, es decir cambiamos el texto para que se note que fue selccionada el area 
            this.classList.add('seleccionada');
            const boton = this.querySelector('.area-button');
            boton.textContent = "✓ Área Seleccionada";
            areaSeleccionada = this.querySelector('.area-title').textContent;

            // despues de haber seleccionado el area, el boton para continuar se habilita para poder seguir con el siguiente paso
            botonContinuar.disabled = false;
            botonContinuar.classList.add('activo');
        });
    });

    // se debe de confirmar para avanzar, es decir primero se debe de selecconar el area para que asi se deshabilite el boton
    botonContinuar.addEventListener('click', function (e) {
        if (!areaSeleccionada) {
            e.preventDefault();
            alert('Selecciona un area primero');
            return;
        }

        // redireccionamos a la pagina para el siguiente paso y por las dudas y por si lo necesitan se envia el area seleccionada
        window.location.href = `D2_Donar.php?area=${encodeURIComponent(areaSeleccionada)}`;
    });
});


//seleccionar el tipo de recurso a donar
// script1.js
document.addEventListener('DOMContentLoaded', function () {
    const selectDonacion = document.getElementById('tipo-donacion');
    const continueButton = document.querySelector('.boton-continuar2');

    selectDonacion.addEventListener('change', function () {
        if (this.value !== '') {
            continueButton.removeAttribute('disabled');
            continueButton.style.opacity = '1';
            continueButton.style.cursor = 'pointer';
        } else {
            continueButton.setAttribute('disabled', true);
            continueButton.style.opacity = '0.5';
            continueButton.style.cursor = 'not-allowed';
        }
    });
});