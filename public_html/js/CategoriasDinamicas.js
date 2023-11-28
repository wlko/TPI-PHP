// Contador para el número de pasos en la categoría Proceso
var count = 1;

function mostrarCategoria(categoria) {
    
    // Limpiar campos dinámicos anteriores
    var camposDinamicos = document.getElementById('camposDinamicos');
    camposDinamicos.innerHTML = '';

    // Crear campos dinámicos según la categoría seleccionada
    switch (categoria) {
        case 'Contacto':
            camposDinamicos.innerHTML = `
                <input type="text" name="nombreContacto" class="form-control form-control-sm mb-2" placeholder="Contactar a..." required >
                <input type="tel" name="telefono" class="form-control form-control-sm mb-2" placeholder="Telefono" required >
                <input type="email" name="email" class="form-control form-control-sm mb-2" placeholder="Email" required >
                <textarea class="form-control form-control-sm mb-2" placeholder="Razón" name="razon" style="height: 100px"></textarea>
                <input type="hidden" name="categoria" value="Contacto">
                <button type="submit" class="btn btn-outline-dark mb-2">Guardar Tarea</button>
            `;
            count = 1;
            break;

        case 'Proceso':
            camposDinamicos.innerHTML = `
                <div id="pasos_container" class="d-flex flex-column g-1">
                    <input id="categoriaHidden" type="hidden" name="categoria" value="Proceso">
                    <input id="tareasHidden" type="hidden" name="tareasHidden" value="">
                    <input type="text" name="subtarea1" placeholder="Subtarea 1" class="form-control form-control-sm mb-1">
                    <button type="button" class="btn btn-dark btn-sm mb-2" onclick="agregarPaso()">+</button>
                </div>
                <button type="submit" class="btn btn-outline-dark mb-2">Guardar Tarea</button>
            `;
            count = 1;
            break;

        case 'Recordatorio':
            camposDinamicos.innerHTML = `
                <input type="date" name="fecha" class="form-control form-control-sm mb-2" required >
                <input type="time" name="hora" class="form-control form-control-sm mb-2" required >
                <input type="hidden" name="categoria" value="Recordatorio">
                <button type="submit" class="btn btn-outline-dark mb-2">Guardar Tarea</button>
            `;
            count = 1;
            break;
        default:
            break;
    }
}

function agregarPaso() {
    count++;

    var divPasos = document.getElementById("pasos_container");

    // Crear un nuevo input para el paso
    var nuevoPasoInput = document.createElement("input");
    nuevoPasoInput.setAttribute("type", "text");
    nuevoPasoInput.setAttribute("name", "subtarea" + count);
    nuevoPasoInput.setAttribute("class", "form-control form-control-sm mb-1");
    nuevoPasoInput.setAttribute("placeholder", "Subtarea " + count);

    // Añadir el nuevo input al formulario
    divPasos.appendChild(nuevoPasoInput);

    // Eliminar el botón '+' de las subtareas anteriores
    var botonesAnteriores = document.querySelectorAll("#pasos_container button");
    botonesAnteriores.forEach(function(boton) {
        boton.remove();
    });

    // Crear un botón '+' solo en el último paso
    var nuevoBoton = document.createElement("button");
    nuevoBoton.setAttribute("type", "button");
    nuevoBoton.setAttribute("class", "btn btn-dark btn-sm mb-2");
    nuevoBoton.setAttribute("onclick", "agregarPaso()")
    nuevoBoton.innerText = "+";

    divPasos.appendChild(nuevoBoton);
}

