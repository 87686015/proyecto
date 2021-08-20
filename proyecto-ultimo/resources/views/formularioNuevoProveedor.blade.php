@extends('plantilla')


@section('titulo')
Nuevo Proveedor
@endsection

@section('content')

<h1>Nuevo Proveedor</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('proveedores.guardar')}}">
    @csrf

<div class="mb-3">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
</div>

<div class="mb-3">
  <label for="correo" class="form-label">Correo</label>
  <input type="text" class="form-control" id="correo" name="correo" placeholder="fulano@gmail.com">
</div>

<div class="mb-3">
  <label for="telefono" class="form-label">Telefono</label>
  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="#### ####">
</div>

<div class="mb-3">
  <label for="contacto" class="form-label">Nombre del contacto</label>
  <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Escriba el nombre del contacto">
</div>


<button type="submit" class="btn btn-info"> Guardar </button>
<button type="reset" class="btn btn-danger"> Reestablecer </button>

</form>


@endsection