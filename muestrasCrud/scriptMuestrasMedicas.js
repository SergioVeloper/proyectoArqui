function cargarMM(url){
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
    const elemento = document.getElementById("muestras");

    // Agrega un listener para el evento 'click'
    elemento.addEventListener("click", function () {
        cargarMM("muestrasCrud/listar.php");
    });
});

function insertarMMe(){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        contenedor.innerHTML = ajax.responseText;
        mostrarEspecialidad();
        mostrarSubEspecialidad()
    }

    ajax.open("GET", "muestrasCrud/formulario_insertar.php", true);
    ajax.send();
}

function insertarMM() {
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    var formulario = document.getElementById('formInsertarMuestrasM');
    var enviarForm = new FormData(formulario);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            // Comprobar la respuesta del servidor
            if (ajax.responseText.trim() === "success") {
                // Si la respuesta es "success", llamar a la función listarMM()
                listarMM();
            } else {
                // Mostrar la respuesta del servidor en el contenedor
                contenedor.innerHTML = ajax.responseText;
            }
        }
    };

    ajax.open("POST", "muestrasCrud/insertar.php", true);
    ajax.send(enviarForm);
}


function listarMM(parametros){
    var elemento = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    if(parametros){
        ajax.open("get", "muestrasCrud/listar.php?"+parametros, true);
    }
    else{
        ajax.open("get", "muestrasCrud/listar.php", true);
    }
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            elemento.innerHTML = ajax.responseText;
        }
    }
    ajax.send();
}

function editarMM(id){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            contenedor.innerHTML = ajax.responseText;
            mostrarEspecialidad(id);
            mostrarSubEspecialidad(id)
        }
    }
    ajax.open("GET", "muestrasCrud/formulario_editar.php?id="+id, true);
    ajax.send()
}

function editarRMM() {
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    formulario = document.getElementById('formEditMM');
    datosForm = new FormData(formulario);
    
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenedor.innerHTML = ajax.responseText;
            
            // Llamar a la función listar() después de que se reciba la respuesta del servidor
            listarMM();  // Aquí llamas a listar() para cargar la lista de muestras médicas
        }
    }
    
    ajax.open("POST", "muestrasCrud/editar.php", true);
    ajax.send(datosForm);
}


function eliminarMM(id){
    var contenedor = document.getElementById('contenido');
    var ajax = new XMLHttpRequest();
    idRescatado = "id="+id;
    ajax.onreadystatechange = function (){
        contenedor.innerHTML = ajax.responseText;
        listarMM();
    }
    ajax.open("GET", "muestrasCrud/eliminar.php?"+idRescatado, true);
    ajax.send();
}

function buscarMM(){
    var palabra = document.getElementById('filtro').value;
    listar('filtro='+palabra);
}

function mostrarEspecialidad(id){
    var contenedor = document.getElementById('seleccionarEsp');
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            especialidades = JSON.parse(ajax.responseText);
            for (let i = 0; i < especialidades.length; i++) {
                const especialidad = especialidades[i];
                let opc = document.createElement('option');
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
        ajax.open("GET", "muestrasCrud/especialidad.php?especialidad_id="+id, true);
    }
    else{
        ajax.open("GET", "muestrasCrud/especialidad.php", true);
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
        ajax.open("GET", "muestrasCrud/especialidad.php?especialidad_id="+id, true);
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
        ajax.open("GET", "muestrasCrud/subespecialidad.php?idMM="+id, true);
    }
    else{
        var id =  document.getElementById('seleccionarEsp').value;
        ajax.open("GET", "muestrasCrud/subespecialidad.php?id="+id, true);
    }


    ajax.send();
}
