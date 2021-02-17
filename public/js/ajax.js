window.onload = function() {
    modal = document.getElementById('myModal');
    mostrarNotas();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function mostrarNotas() {
    var notas = document.getElementById('notas');
    var filtro = document.getElementById('buscador').value;
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('post', 'mostrar', true);
    var datos = new FormData();
    datos.append('filtro', filtro);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            var tabla = "";
            tabla += '<thead class="table-dark">';
            tabla += '<th>Titulo</th>';
            tabla += '<th>Descripción</th>';
            tabla += '<th colspan="2">Opciones</th>';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '</thead>';
                tabla += '<tbody>';
                tabla += '<tr>';
                tabla += '<td>'+respuesta[i].tittle+'</td>';
                tabla += '<td>'+respuesta[i].description+'</td>';
                tabla += '<td><button id="update" onclick="openModal('+respuesta[i].id+')" class="btn btn-outline-primary">Modificar</button></td>';
                tabla += '<td><button id="update" onclick="notasDelete('+respuesta[i].id+')" class="btn btn-outline-danger">Eliminar</button></td>';
                tabla += '</tr>';
                tabla += '</tbody>';
            }
            notas.innerHTML = tabla;
        }
    }
    ajax.send(datos);
}
{/* <thead class="table-dark">
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th colspan="2">Opciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button id="{{$not->id}}" class="btn btn-outline-primary">Modificar</button></td>
                            <td><form action="{{url('/borrar/'.$not->id)}}" method="post">
                                <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                            </form></td>
                        </tr>
                    </tbody> */}

function crearNota() {
    var title = document.getElementById('title').value;
    var description = document.getElementById('desc').value;
    var msg = document.getElementById('msg');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'crear', true);
    var datos = new FormData();
    datos.append('title', title);
    datos.append('desc', description);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            if (respuesta.resultado == 'OK') {
                document.getElementById('title').value= "";
                document.getElementById('desc').value = "";
                msg.innerHTML= "Nota Creada Correctamente";
                msg.style.color= "green";
                
            } else {
                mensaje.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
                msg.style.color= "red";
            }
            
            mostrarNotas();
        }
    }
    ajax.send(datos);
    
} 

function updateNotas() {
    var msg = document.getElementById('msg');
    var id = document.getElementById('idUpdate').value;
    var title = document.getElementById('titleUpdate').value;
    var desc = document.getElementById('descUpdate').value;
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'updateNotas', true);
    var datos = new FormData();
    datos.append('id', id);
    datos.append('title', title);
    datos.append('desc', desc);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            if (respuesta.resultado == 'OK') {
                msg.innerHTML= "Se ha modificado con exito";
                msg.style.color= "green";
            } else {
                mensaje.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            }
            closeModal();
            mostrarNotas();
        }
    }
    ajax.send(datos);
}
function notasContent(num) {
    var msg = document.getElementById('msg');
    // var id = num;
    var title = document.getElementById('titleUpdate');
    var desc = document.getElementById('descUpdate');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('post', 'notasContent', true);
    var datos = new FormData();
    datos.append('id', num);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
                console.log(respuesta);
                // msg.innerHTML= "Se ha modificado con exito"
                title.value = respuesta[0].tittle;
                desc.value = respuesta[0].description;
                // msg.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            mostrarNotas();
        }
    }
    ajax.send(datos);
}

function notasDelete(id) {
    var msg = document.getElementById('msg');
    // var id = num;
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('post', 'notasDelete', true);
    var datos = new FormData();
    datos.append('id', id);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
                console.log(respuesta);
                msg.innerHTML = "Se ha borrado con exito"
                msg.style.color = "red";
                // msg.innerHTML= "Se ha modificado con exito"
                // msg.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            mostrarNotas();
        }
    }
    ajax.send(datos);
}

function openModal(num) {
    modal.style.display = "block";
    // console.log(num);
    document.getElementById('idUpdate').value = num;
    notasContent(num)
}

function closeModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}