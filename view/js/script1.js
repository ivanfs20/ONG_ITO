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




/*document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('area-select');
    const allProjects = document.querySelectorAll('.projects-container');
    const botonContinuar = document.querySelector('.boton-continuar');
    const botonesDonar = document.querySelectorAll('.project-button');

    let areaSeleccionada = '';
    let proyectoSeleccionado = '';

    // Deshabilitamos el botón al inicio
    botonContinuar.classList.remove('activo');
    botonContinuar.setAttribute('disabled', 'true');

    // Mostrar proyectos por área
    select.addEventListener('change', function () {
        areaSeleccionada = this.value;
        proyectoSeleccionado = ''; // reiniciamos el proyecto seleccionado

        // Ocultar todos
        allProjects.forEach(project => project.style.display = 'none');

        // Mostrar el del área
        const selectedContainer = document.getElementById(areaSeleccionada);
        if (selectedContainer) {
            selectedContainer.style.display = 'block';
        }

        // Desactivamos el botón "Continuar" (se activa solo si se da clic en "Donar")
        botonContinuar.classList.remove('activo');
        botonContinuar.setAttribute('disabled', 'true');
    });

    // Cuando se hace clic en un botón "Donar"
    botonesDonar.forEach(boton => {
        boton.addEventListener('click', function () {
            proyectoSeleccionado = this.getAttribute('data-proyecto');

            if (!areaSeleccionada || !proyectoSeleccionado) {
                alert('Selecciona un área y un proyecto');
                return;
            }

            // Activar botón continuar
            botonContinuar.classList.add('activo');
            botonContinuar.removeAttribute('disabled');
        });
    });

    // Clic en botón continuar
    botonContinuar.addEventListener('click', function (e) {
        if (!areaSeleccionada || !proyectoSeleccionado) {
            e.preventDefault();
            alert('Primero selecciona un proyecto dando clic en "Donar".');
            return;
        }

        // Redirección con parámetros
        const url = `D2_Donar.php?area=${encodeURIComponent(areaSeleccionada)}&proyecto=${encodeURIComponent(proyectoSeleccionado)}`;
        window.location.href = url;
    });
});*/



//seleccionar el tipo de recurso a donar
// script1.js
document.addEventListener('DOMContentLoaded', function () {
    const selectDonacion = document.getElementById('tipo-donacion');
    const botonContinuar = document.getElementById('boton-continuar');
    const formDonacion=document.getElementById('formDonacion');

    // Habilitar botón cuando se seleccione una opción válida
    selectDonacion.addEventListener('change', function () {
        if (this.value !== '') {
            botonContinuar.disabled = false;
        } else {
            botonContinuar.disabled = true;
        }
    });

    // Manejar el clic del botón
    botonContinuar.addEventListener('click', function () {
        const valor = selectDonacion.value;
        let url = '';

        if (valor === 'dinero') {
            //url = 'D31_TipoTarjeta.php';
            formDonacion.action='D31_TipoTarjeta.php';
        } else if (valor === 'recurso') {
            //url = 'D32_TipoRecurso.php';
            formDonacion.action='D32_TipoRecurso.php';
        }
        formDonacion.submit();
        //if (url) window.location.href = url;
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Elementos del DOM
    const carruselPista = document.querySelector('.carrusel-pista');
    const slides = document.querySelectorAll('.carrusel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicadoresContainer = document.getElementById('indicadores');

    // Variables de estado
    let currentIndex = 0;
    const totalSlides = slides.length;
    const slideWidth = slides[0].offsetWidth;

    // Crear indicadores
    slides.forEach((_, index) => {
        const indicador = document.createElement('div');
        indicador.classList.add('indicador');
        if (index === 0) indicador.classList.add('activo');
        indicador.addEventListener('click', () => goToSlide(index));
        indicadoresContainer.appendChild(indicador);
    });

    // Función para actualizar la posición del carrusel
    function updatePosition() {
        carruselPista.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

        // Actualizar indicadores
        document.querySelectorAll('.indicador').forEach((indicador, index) => {
            if (index === currentIndex) {
                indicador.classList.add('activo');
            } else {
                indicador.classList.remove('activo');
            }
        });

        // Actualizar estado de los botones
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === totalSlides - 1;
    }

    // Navegación
    function goToSlide(index) {
        currentIndex = index;
        updatePosition();
    }

    function nextSlide() {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
            updatePosition();
        }
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
            updatePosition();
        }
    }

    // Event listeners
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);

    // Responsive: actualizar en cambio de tamaño
    window.addEventListener('resize', () => {
        // Recalcular el ancho del slide
        const newSlideWidth = slides[0].offsetWidth;
        carruselPista.style.transform = `translateX(-${currentIndex * newSlideWidth}px)`;
    });

    // Inicializar estado de botones
    updatePosition();
});

document.addEventListener('DOMContentLoaded', function () {
    const selectProyecto = document.getElementById('area-select');
    const beneficiariosContainer = document.getElementById('beneficiarios-container');
    const botonContinuar = document.querySelector('.boton-continuar');

    let proyectoSeleccionado = '';

    // Deshabilitamos el botón al inicio
    botonContinuar.classList.remove('activo');
    botonContinuar.setAttribute('disabled', 'true');

    // Cuando se cambia el proyecto seleccionado
    selectProyecto.addEventListener('change', function () {
        const idProyecto = this.value;
        proyectoSeleccionado = ''; // Reiniciamos la selección

        if (idProyecto) {
            fetch(`../controller/obtenerBeneficiariosController.php?idProyecto=${idProyecto}`)
                .then(response => response.json())
                .then(data => {
                    beneficiariosContainer.innerHTML = ''; // Limpiar antes de agregar nuevos beneficiarios

                    if (data.length > 0) {
                        data.forEach(beneficiario => {
                            // Crear elementos de forma segura
                            const div = document.createElement('div');
                            div.classList.add('project-item');

                            const titulo = document.createElement('h3');
                            titulo.classList.add('project-title');
                            titulo.textContent = beneficiario.name;

                            const descripcion = document.createElement('p');
                            descripcion.classList.add('project-description');
                            descripcion.textContent = beneficiario.description;

                            const botonDonar = document.createElement('button');
                            botonDonar.classList.add('project-button');
                            botonDonar.setAttribute('data-beneficiario', beneficiario.name);
                            botonDonar.textContent = 'Donar';

                            // Agregar evento de clic al botón
                            botonDonar.addEventListener('click', function () {
                                proyectoSeleccionado = this.getAttribute('data-beneficiario');

                                if (!proyectoSeleccionado) {
                                    alert('Selecciona un beneficiario antes de continuar.');
                                    return;
                                }

                                // Activar botón "Continuar"
                                botonContinuar.classList.add('activo');
                                botonContinuar.removeAttribute('disabled');
                            });

                            // Añadir elementos al div
                            div.appendChild(titulo);
                            div.appendChild(descripcion);
                            div.appendChild(botonDonar);

                            // Agregar div al contenedor
                            beneficiariosContainer.appendChild(div);
                        });
                    } else {
                        beneficiariosContainer.innerHTML = '<p>No hay beneficiarios para este proyecto.</p>';
                    }
                })
                .catch(error => console.error('Error al obtener beneficiarios:', error));
        }
    });

    // Redirección cuando se haga clic en "Continuar"
    botonContinuar.addEventListener('click', function (e) {
        if (!proyectoSeleccionado) {
            e.preventDefault();
            alert('Selecciona un beneficiario antes de continuar.');
            return;
        }

        // Redirigir con parámetros
        const url = `D2_Donar.php?beneficiario=${encodeURIComponent(proyectoSeleccionado)}`;
        window.location.href = url;
    });
});