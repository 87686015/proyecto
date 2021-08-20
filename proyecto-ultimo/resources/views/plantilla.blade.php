<!DOCTYPE html>
<!-- saved from url=(0113)https://campusvirtual.unah.edu.hn/pluginfile.php/2147671/question/questiontext/3993245/2/151605188/plantilla.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>El Popular- @yield('titulo')</title>
</head>
<body  style="background:pink">
<header>
<!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:pink" >mercadito "El Popular"</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('proveedores.index')}}">Proveedores</a>  
                    <a class="nav-link active" aria-current="page" href="{{route('clientes.index')}}">Clientes</a>    
                    <a class="nav-link active" aria-current="page" href="{{route('productos.index')}}">Productos</a>    
                    <a class="nav-link active" aria-current="page" href="{{route('ventas.index')}}">Ventas</a>                 
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="flex-shrink-0">
<div class="container " >
    @yield('content')

</div>
</main>







</body></html>