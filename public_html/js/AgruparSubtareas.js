function actualizarsubtareasArray() {
    // Reiniciar el array de subtareas
    subtareasArray = [];

    // Obtener todos los inputs de subtareas y agregarlos al array
    var inputssubtareas = document.querySelectorAll("[name^='subtarea']");
    inputssubtareas.forEach(function(input) {
        subtareasArray.push(input.value);
    });
    
    return subtareasArray;
}

// Manejar el envío del formulario
document.getElementById("taskForm").addEventListener("submit", function() {
    // Verificar si la tarea es categoria Proceso
    if (document.getElementById("categoriaHidden").value === 'Proceso') {
        // Actualizar el campo oculto con el array de subtareas
        var subtareas = actualizarsubtareasArray();
        document.getElementById("tareasHidden").value = JSON.stringify(subtareas);

        subtareasHidden = document.getElementById("tareasHidden").value;
    }
});