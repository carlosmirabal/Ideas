<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>IDEAS</title>
</head>
<body> 
    <H1>Mis Notas</H1>
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="col-4 float-left form-group bg-dark ">
                <!-- <h3>Notas</h3> -->
                    <form method="POST" onsubmit="crear">
                        <br><br>
                    @csrf
                        <label for="fname">Título</label>
                        <input type="text" class="form-control" id="fname" name="title" placeholder="Titulo..."><br>
            
                        <label for="lname">Descripción</label>
                        <input type="text" class="form-control" id="lname" name="description" placeholder="Descripción..."> <br>
                    
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
            </div>
            <div class="col-8 float-right">
                <table class="table table-light">
                    <thead class="table-dark">
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th colspan="2">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($notas as $not)
                        <tr>
                            <td>{{$not->tittle}}</td>
                            <td>{{$not->description}}</td>
                            <td><button id="{{$not->id}}" class="btn btn-outline-primary">Modificar</button></td>
                            <td><form action="{{url('/borrar/'.$not->id)}}" method="post">
                                {{csrf_field()}}
                                <!-- Metodo para eliminar -->
                                {{method_field('DELETE')}}
                                <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- </div> -->
    </div>

<!-- The Modal -->
    @foreach ($notas as $not)
        <div id="myModal.{{$not->id}}" class="modal">
            <!-- Modal content -->
            <div class="modal-content form-group bg-dark align-items-center ">
                <br>
                <form action="{{('actualizar/'.$not->id)}}" class="modal-form " method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="tittle" value="{{$not->tittle}}">
                    <label for="title">Descripción</label>
                    <input type="text" class="form-control" name="description" value="{{$not->description}}"> <br>
                    <input type="submit" class="form-control btn btn-primary" name="Enviar" value="Modificar">
                </form>
                <br><br><br>
            <span class="close" id="close.{{$not->id}}">&times;</span>
            </div>
        </div>
    <script>
        // Get the modal
        var modal{{$not->id}} = document.getElementById("myModal.{{$not->id}}");

        // Get the button that opens the modal
        var btn{{$not->id}} = document.getElementById("{{$not->id}}");

        // Get the <span> element that closes the modal
        var span{{$not->id}} = document.getElementById("close.{{$not->id}}");
        // var span = document.getElementsByClassName("actu")[i];

        // When the user clicks the button, open the modal 
        btn{{$not->id}}.onclick = function() {
         modal{{$not->id}}.style.display = "block";

        }

        //When the user clicks on <span> (x), close the modal
        span{{$not->id}}.onclick = function() {
            modal{{$not->id}}.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal{{$not->id}}.style.display = "none";
            }
        }
    </script>
    @endforeach

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>