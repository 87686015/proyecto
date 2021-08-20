@extends('plantilla')


@section('titulo')
Nuevo Cliente
@endsection

@section('content')

<h1>Nuevo Cliente</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('cliente.guardar')}}">
    @csrf

<div class="mb-3">
  <label for="nombre" class="form-label">Nombre </label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
</div>


<div class="mb-3">
  <label for="telefono" class="form-label">Telefono</label>
  <input type="number" class="form-control" id="telefono" name="telefono" placeholder="#### ####">
</div>


<button type="submit" class="btn btn-info"> Guardar </button>
<button type="reset" class="btn btn-danger"> Reestablecer </button>

</form>


@endsection