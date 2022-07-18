<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anime Toons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function agregarAnime() {
            let nombre = document.getElementById("nombre").value;
            let ano = document.getElementById("ano").value;
            let autor = document.getElementById("autor").value;
            let genero = document.getElementById("genero").value;
            let episodios = document.getElementById("episodios").value;
            let origen = document.getElementById("origen").value;
            let fechaInicio = document.getElementById("fechaI").value;
            let fechaFin = document.getElementById("fechaF").value;
            let mutation = `
            mutation miMutation($input:AnimeInput){
                addAnime(input:$input){
                    id
                    nombre
                    ano
                    autor
                    genero
                    episodios
                    origen
                    fechaInicio
                    fechaFin
                }
            }
            `;
            $.ajax({
                type: "POST",
                url: "http://localhost:8090/serverAnime",
                contentType: "application/json",
                timeout:15000,
                data: JSON.stringify({
                    query: mutation,
                    variables: {
                        input: {
                            nombre: nombre,
                            ano: ano,
                            autor: autor,
                            genero: genero,
                            episodios: episodios,
                            origen: origen,
                            fechaInicio: fechaInicio,
                            fechaFin: fechaFin
                        }
                    }
                }),
                success: function(response) {
                    alert ("anime agregado correctamente");
                }
            })
        };
    </script>
</head>

<body >
    <!-- nanbar anime -->
    <nav class="navbar navbar-expand-sm bg-primary">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link 3</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- formulario para agregar anime -->
    <div class="container">
        <div class="row d-flex ">
            <div class="col-md-3">
                <h2>Holas</h2>
            </div>
            <div class="col-md-6 ">
                <h1>Agregar Anime</h1>
                <form >
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="ano">Año:</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="ano">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="autor">
                    </div>
                    <div class="form-group">
                        <label for="genero">Genero:</label>
                        <input type="text" class="form-control" id="genero" name="genero" placeholder="genero">
                    </div>
                    <div class="form-group">
                        <label for="episodios">Episodios:</label>
                        <input type="text" class="form-control" id="episodios" name="episodios" placeholder="episodios">
                    </div>
                    <div class="form-group">
                        <label for="origen">Origen:</label>
                        <input type="text" class="form-control" id="origen" name="origen" placeholder="origen">
                    </div>
                    <div class="form-group">
                        <label for="fechaI">Fecha de inicio:</label>
                        <input type="text" class="form-control" id="fechaI" name="fechaI" placeholder="fechaI">
                    </div>
                    <div class="form-group">
                        <label for="fechaF">Fecha de fin:</label>
                        <input type="text" class="form-control" id="fechaF" name="fechaF" placeholder="fechaF">
                    </div>
                    <button type="button" onclick="agregarAnime();" class="btn btn-primary">Agregar a Lista</button>
                </form >
            </div>
            <div class="col-md-3">
                <h2>Holas</h2>
            </div>
        </div>
    </div>
    <!-- tabla de anime -->
</body >

</html>