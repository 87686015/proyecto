@extends('plantilla')


@section('titulo')
Nuevo Venta
@endsection

@section('content')

<h1>Nueva Venta</h1>

&nbsp;

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('ventas.guardar')}}">
    @csrf

    <label for="cliente" class="form-label">Elije un cliente que hara la compra </label>
<select class="form-select"  id="cliente" name="cliente">
  <option selected>Cliente</option>
  @foreach($clientes as $c)
  <option value="{{$c->nombre_cliente}}">{{$c->nombre_cliente}}</option>
  @endforeach
</select>



<br>
<button type="submit" class="btn btn-info"> Siguiente </button>

</form>


@endsection