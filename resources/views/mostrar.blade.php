<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="js/ajax.js"></script>

    <title>IDEAS</title>
</head>
<body> 
    <H1>Mis Notas</H1>
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="col-4 float-left form-group bg-dark ">
                <!-- <h3>Notas</h3> -->
                    <label for="buscador">Buscador</label>
                    <br>
                    <input type="text" id="buscador" onkeyup="mostrarNotas()">
                    <form method="POST" onsubmit="crearNota(); return false;">
                        <br><br>

                        <label for="fname">Título</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titulo..."><br>
            
                        <label for="lname">Descripción</label>
                        <input type="text" class="form-control" id="desc" name="description" placeholder="Descripción..."> <br>
                    
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                        <p id="msg"></p>
            </div>
            <div class="col-8 float-right">
                <table class="table table-light" id="notas">
                    
                </table>
            </div>
        <!-- </div> -->
    </div>

<!-- The Modal -->

        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content form-group bg-dark align-items-center ">
                <br>
                <form action="" class="modal-form " method="POST" onsubmit="updateNotas(); return false;">
                    <input type="hidden" name="id" id="idUpdate">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="tittle" value="" id="titleUpdate">
                    <label for="title">Descripción</label>
                    <input type="text" class="form-control" name="description" value="" id="descUpdate"> <br>
                    <input type="submit" class="form-control btn btn-primary" name="Enviar" value="Modificar">
                </form>
                <br><br><br>
            <span class="close" id="close">&times;</span>
            </div>
        </div>
    <script>
        // Get the modal
        // var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        // var btn = document.getElementById(");

        // Get the <span> element that closes the modal
        // var span = document.getElementById("close");
        // var span = document.getElementsByClassName("actu")[i];

        // When the user clicks the button, open the modal 
        // btn.onclick = function() {
        //  modal.style.display = "block";

        // }

        // //When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>