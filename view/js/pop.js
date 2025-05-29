
    function mostrarMensaje({ mensaje, redireccion, imagen }) {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgb(255, 255, 255)';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = 1000;
    
        const popup = document.createElement('div');
        popup.style.background = 'rgb(255, 238, 5)';
        popup.style.padding = '20px';
        popup.style.borderRadius = '10px';
        popup.style.textAlign = 'center';
        popup.style.boxShadow = '0 0 10px rgb(255, 255, 255)';
    
        const message = document.createElement('p');
        message.textContent = mensaje;
        message.style.fontFamily = 'monospace';
        message.style.fontSize = '25px';
    
        const imagenElem = document.createElement("img");
        imagenElem.src = imagen;
        imagenElem.alt = "Imagen de estado";
        imagenElem.width = 100;
        imagenElem.height = 100;
    
        const button = document.createElement('button');
        button.textContent = 'Regresar';
        button.style.marginTop = '10px';
        button.style.padding = '10px 20px';
        button.style.cursor = 'pointer';
        button.style.backgroundColor = 'rgb(16, 94, 219)';
        button.style.color = '#fff';
        button.style.border = 'none';
        button.style.borderRadius = '5px';
    
        button.addEventListener('click', function () {
            window.location.href = redireccion;
        });
    
        popup.appendChild(message);
        popup.appendChild(imagenElem);
        popup.appendChild(document.createElement('br'));
        popup.appendChild(button);
        overlay.appendChild(popup);
        document.body.appendChild(overlay);
    }