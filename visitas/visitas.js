function mostrarListaMedicosParaVisitar() {
    // Realiza la solicitud fetch al hacer clic en el elemento
    fetch("visitas/listarMedicosParaVisitar.php")
    .then(response => response.text())
    .then(data => {
        // Inserta el contenido en el elemento con ID 'contenidos'
        document.getElementById("contenido").style.height = "700px";
        document.getElementById("contenido").innerHTML = data;
    });
}

function llamarAListarMedicosParaVisitar() {
    // Selecciona el elemento con el ID 'medicosCRUD'
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        contenedor.innerHTML = ajax.responseText;
    }

    ajax.open("GET", "visitas/listarMedicosParaVisitar.php", true);
    ajax.send();

}

document.addEventListener("DOMContentLoaded", function () {
    // Selecciona el elemento con el ID 'medicosCRUD'
    const elemento = document.getElementById("visitas");

    // Agrega un listener para el evento 'click'
    elemento.addEventListener("click", function () {
        //console.log("El botón de medicos fue clicado.");
        llamarAListarMedicosParaVisitar();
    });
});

function misRutas() {
    fetch("visitas/misRutas.php")
    .then(response => response.text())
    .then(data => {
        // Inserta el contenido en el elemento con ID 'contenidos'
        
        document.getElementById("contenido").innerHTML = data;
    });
}

document.addEventListener("DOMContentLoaded", function () {
    // Selecciona el elemento con el ID 'medicosCRUD'
    const elemento = document.getElementById("rutas");

    // Agrega un listener para el evento 'click'
    elemento.addEventListener("click", function () {
        //console.log("El botón de medicos fue clicado.");
        misRutas();
    });
});


function generarRuta(id, pID) {
    fetch("visitas/generadorRutas.php")
    .then(response => response.text())
    .then(data => {
        // Inserta el contenido en el elemento con ID 'contenidos'
        document.getElementById("contenido").innerHTML = data;
        if(id && pID){
            let elements = document.getElementsByClassName('boton-punto-partida');
            let ax = (id - pID);
            console.log('direferncia' + ax);
            // Loop through the elements
            for (let i = 0; i < elements.length; i++) {
                console.log(elements[i].innerHTML);
                if(i <= ax){
                    elements[i].innerHTML = "<p class='btn btn-primary w-100' >Registrado</p>";
                }            
            }
        }
    });
}

//Datos rescatados para el formulario puestos dentro de un div y dentro del contenedor principal para mostrarse

function incluirInfoMedico(id){
    // Rescata la información del médico para incluir a la parte izquierda del formulario
    var infoSuperiorIzquierda  = document.createElement("div");
    infoSuperiorIzquierda.id = "infoSuperiorIzquierda";
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var medico = JSON.parse(this.responseText);
            var contenido = '<div class="card mb-3">';
            contenido += '<div class="card-header bg-primary text-white">Información del médico</div>';
            contenido += '<div class="card-body">';

            for(let i = 0; i < medico.length; i++){
                let med = medico[i];
                contenido += '<h5 class="card-title">' + med.nombres + ' ' + med.apellidos + '</h5>';
                contenido += '<p class="card-text"><strong>Especialidad:</strong> ' + med.especialidad + '</p>';
                contenido += '<p class="card-text"><strong>Subespecialidad:</strong> ' + med.subespecialidad + '</p>';
            }

            contenido += '</div></div>';
            document.getElementById('infoMedicos').innerHTML = contenido;
        }
    };
    ajax.open("GET", "visitas/medicoJsonConId.php?idMedico=" + id, true);
    ajax.send();
}


function incluirInfoMuestrasMedicas(id){
    // Rescata la información de las muestras médicas para incluir a la parte derecha del formulario
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var muestras = JSON.parse(this.responseText);
            var contenido = '<div class="card mb-3">';
            contenido += '<div class="card-header bg-primary text-white">Muestras Entregadas</div>';
            contenido += '<div class="card-body">';
            contenido += '<div class="row">'; // Iniciar la fila

            for(let i = 0; i < muestras.length; i++){ 
                let muestra = muestras[i]; 
                
                contenido += '<div class="col-12 col-md-4 mb-3">'; // Columna de 12 en pantallas pequeñas y 4 en medianas/grandes
                contenido += `<div class="card h-100">`; // Iniciar un card dentro de la columna para mejor manejo
                contenido += `<div class="card-header text-center font-weight-bold">${muestra.nombreMuestra}</div>`;
                contenido += '<div class="card-body">';
                contenido += `<input type="hidden" name="medicamento_id[]" value="${muestra.id}">`; 
                contenido += `<input placeholder="Cantidad" type="number" name="cantidadMuestra[]" class="form-control mt-2">`;
                contenido += '</div></div>'; // Cerrar card y columna
                contenido += '</div>';
            }

            contenido += '</div>'; // Cerrar fila
            contenido += '</div></div>'; // Cerrar card-body y card

            document.getElementById('infoMuestras').innerHTML = contenido;
        }
    };
    ajax.open("GET", "visitas/muestrasMedicasJsonConId.php?idMedico=" + id, true);
    ajax.send();
}



// Funcion para rescatar medicos por su id

function mostrarDatosVisita(id){
    var contenido = document.getElementById("contenido");
    contenido.innerHTML = "";
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4){
            contenido.innerHTML = ajax.responseText;
            incluirInfoMedico(id);
            incluirInfoMuestrasMedicas(id);
        }
    }
    ajax.open("GET", "visitas/fomularioVisita.php?id_medico="+id, true);
    ajax.send();
}

//Funcion para insertar la visita en la base de datos

function insertarVisita(){
    var contenido = document.getElementById("contenido");
    var formulario = document.getElementById("insertarVisitarform");
    var ajax = new XMLHttpRequest();
    enviarForm = new FormData(formulario);
    ajax.onreadystatechange = function (){
        mostrarListaMedicosParaVisitar();
    }
    ajax.open("POST", "visitas/insetarVisita.php", true);
    ajax.send(enviarForm);
}

function insertarMedicosRuta(){
    var contenedor = document.getElementById("seleccionarDirMedico");
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4){
            medicos = JSON.parse(ajax.responseText);
            for (let i = 0; i < medicos.length; i++) {
                const medico = medicos[i];
                let opt = document.createElement('option');
                opt.innerHTML = medico.nombres + " " + medico.apellidos;
                opt.value = medico.id;
                if(i == 0){
                    opt.selected = true;
                }
                contenedor.appendChild(opt);
            }
        }
    }
    ajax.open("GET", "visitas/medicoJson.php", true);
    ajax.send();
}

function actualizarInptDireccion(){
    var contenedor = document.getElementById('inptDireccionMedico');
    var id =  document.getElementById('seleccionarDirMedico').value;

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            medico = JSON.parse(ajax.responseText);
            for (let i = 0; i < medico.length; i++) {
                const element = medico[i];
                contenedor.value = element.direccion;
            }
        }
    }
    ajax.open("GET", "visitas/medicoJsonConId.php?idMedico="+id, true);
    ajax.send();
}

function mostrarHora(){
                // Obtiene la fecha y hora actual
     const ahora = new Date();
                // Formatea la hora en HH:MM:SS
     const hora = ahora.getHours().toString().padStart(2, '0') + ':' +
           ahora.getMinutes().toString().padStart(2, '0') + ':' +
            ahora.getSeconds().toString().padStart(2, '0');
                // Muestra la hora en el input
     document.getElementById('horaRuteroVis').value = hora;
}

function insertarRuta() {
    var formulario = document.getElementById("formularioRegistrarRuta");
    var ajax = new XMLHttpRequest();
    var enviarForm = new FormData(formulario);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            obtenerPuntosHoy();
        }
    };

    ajax.open("POST", "visitas/insertarPuntoEntradaSalida.php", true);
    ajax.send(enviarForm);
}


function cargarFormularioPuntos(buttonId) {
    var contenido = document.getElementById("contenido");
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
            insertarMedicosRuta();
            mostrarHora();

            // Guardamos el ID del botón actual para ocultarlo después
            document.getElementById("formularioRegistrarRuta").setAttribute("data-button-id", buttonId);
            
            // Mostrar el formulario
            contenido.style.display = 'block';
        }
    }
    ajax.open("GET", "visitas/formularioRegistrarRuta.php", true);
    ajax.send();
}

function obtenerPuntosHoy(){
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4){
            console.log(ajax.responseText);
            if(ajax.responseText != 0){
            puntos = JSON.parse(ajax.responseText);
            for (let i = 0; i < puntos.length; i++) {
                const element = puntos[i];
                obtenerUltimoIdTurno(element.id);
            }
        }
        else{
            generarRuta();
        }
        }
    }
    ajax.open("GET", "visitas/obtenerIdRutaPorDia.php", true);
    ajax.send();
}

function obtenerUltimoIdTurno(id){
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4){
            puntos = JSON.parse(ajax.responseText);
            for (let i = 0; i < puntos.length; i++) {
                const element = puntos[i];
                console.log("utlimo id del turno:"+element.id);
                obtenerPrimerIdTurno(id, element.id);

            }
        }
    }
    ajax.open("GET", "visitas/obtenerUltimoIdTurno.php?id_entradaSalida="+id, true);
    ajax.send();
}

function obtenerPrimerIdTurno(idE, idUltimo){
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4){
            puntos = JSON.parse(ajax.responseText);
            for (let i = 0; i < puntos.length; i++) {
                const element = puntos[i];
                console.log("primer id del turno:"+element.id);
                generarRuta( idUltimo ,element.id);
            }
        }
    }
    ajax.open("GET", "visitas/obtenerPrimerIdTuno.php?id_entradaSalida="+idE, true);
    ajax.send();
}