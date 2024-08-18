function cargarMedic(url){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        contenedor.innerHTML = ajax.responseText;
    }

    ajax.open("GET", url, true);
    ajax.send();
}

document.addEventListener("DOMContentLoaded", function () {
    // Selecciona el elemento con el ID 'medicosCRUD'
    const elemento = document.getElementById("medicos");

    // Agrega un listener para el evento 'click'
    elemento.addEventListener("click", function () {
        cargarMedic("medicosCrud/listar.php");
    });
});

function insertarMedic(){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        contenedor.innerHTML = ajax.responseText;
        mostrarEspecialidad();
        mostrarSubEspecialidad()
    }

    ajax.open("GET", "medicosCrud/formulario_insertar.php", true);
    ajax.send();
}

function insertarMedico() {
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    var formulario = document.getElementById('formInsertarMedico');
    var enviarForm = new FormData(formulario);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            // Comprobar la respuesta del servidor
            if (ajax.responseText.trim() === "success") {
                // Si la respuesta es "success", llamar a la función listarMM()
                listarMedicos();
            } else {
                // Mostrar la respuesta del servidor en el contenedor
                contenedor.innerHTML = ajax.responseText;
            }
        }
    };

    ajax.open("POST", "medicosCrud/insertar.php", true);
    ajax.send(enviarForm);
}


function listarMedicos(parametros){
    var elemento = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    if(parametros){
        ajax.open("get", "medicosCrud/listar.php?"+parametros, true);
    }
    else{
        ajax.open("get", "medicosCrud/listar.php", true);
    }
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            elemento.innerHTML = ajax.responseText;
        }
    }
    ajax.send();
}

function editarMedico(id){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            contenedor.innerHTML = ajax.responseText;
            mostrarEspecialidad(id);
            mostrarSubEspecialidad(id)
        }
    }
    ajax.open("GET", "medicosCrud/formulario_editar.php?id="+id, true);
    ajax.send()
}

function editarMedic() {
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    formulario = document.getElementById('formEditMedic');
    datosForm = new FormData(formulario);
    
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenedor.innerHTML = ajax.responseText;
            //console.log(ajax.responseText);
            // Llamar a la función listar() después de que se reciba la respuesta del servidor
            listarMedicos();
        }
    }
    
    ajax.open("POST", "medicosCrud/editar.php", true);
    ajax.send(datosForm);
}


function eliminarMedico(id){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    idRescatado = "id="+id;
    ajax.onreadystatechange = function (){
        contenedor.innerHTML = ajax.responseText;
        listarMedicos();
    }
    ajax.open("GET", "medicosCrud/eliminar.php?"+idRescatado, true);
    ajax.send();
}

function buscarMM(){
    var palabra = document.getElementById('filtro').value;
    listar('filtro='+palabra);
}

function mostrarEspecialidadM(id){
    var contenedor = document.getElementById('seleccionarEsp');
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            especialidades = JSON.parse(ajax.responseText);
            for (let i = 0; i < especialidades.length; i++) {
                const especialidad = especialidades[i];
                let opc = document.createElement('option');
                console.log(especialidad);
                opc.innerHTML = especialidad.nombre;
                opc.value = especialidad.id;
                if(i == 0){
                    opc.selected = true;
                }
                // if(id){
                //     if(i == id){
                //         opc.selected = true;
                //     }
                // }
                contenedor.appendChild(opc);
            }
        }
    }
    if(id){
        ajax.open("GET", "medicosCrud/especialidad.php?especialidad_id="+id, true);
    }
    else{
        ajax.open("GET", "medicosCrud/especialidad.php", true);
    }

    ajax.send();
}

function guardarEspecialidad(id){
    var ajax = new XMLHttpRequest();
    console.log("holaaaaa");
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            especialidades = JSON.parse(ajax.responseText);
            console.log("holaaaaa");
            for (let i = 0; i < especialidades.length; i++) {
                const especialidad = especialidades[i];
                var idEsp = parseInt(especialidad.id);
                console.log(idEsp)
                mostrarEspecialidad(idEsp);
        }
    }
        ajax.open("GET", "medicosCrud/especialidad.php?especialidad_id="+id, true);
        ajax.send();
    }
}

function mostrarSubEspecialidad(id){
    var contenedor = document.getElementById('seleccionarSubesp');
    contenedor.innerHTML = '';
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){

            subespecialidades = JSON.parse(ajax.responseText);
            for (let i = 0; i < subespecialidades.length; i++) {

                const element = subespecialidades[i];

                let inpt = document.createElement('option');
                inpt.value = element.id;
                inpt.innerHTML = element.nombre;
                if(i == 0){
                    inpt.selected = true;
                }
                contenedor.appendChild(inpt);
            }

        }
    }
    if(id){
        ajax.open("GET", "medicosCrud/subespecialidad.php?idMM="+id, true);
    }
    else{
        var id =  document.getElementById('seleccionarEsp').value;
        ajax.open("GET", "medicosCrud/subespecialidad.php?id="+id, true);
    }


    ajax.send();
}
