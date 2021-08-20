@extends('plantilla')


@section('titulo')
Editar Producto
@endsection

@section('content')

<h5>Editar Procuto</h5>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('productos.update',['id'=>$productos->id])}}">

    @csrf



<div class="mb-3">
  <label for="nombre_p" class="form-label">Nombre </label>
  <input value="{{$productos->nombre_p}}" type="text" class="form-control" id="nombre_p" name="nombre_p" placeholder="Escriba el nombre del producto">
</div>


<div class="mb-3">
  <label for="categoria_p" class="form-label">Categoria</label>
  <input  value="{{$productos->categoria_p}}"  type="text" class="form-control" id="categoria_p" name="categoria_p" placeholder="#### ####">
</div>

<div class="mb-3">
  <label for="precio_c" class="form-label">Precio de Compra</label>
  <input  value="{{$productos->precio_c}}" type="number" class="form-control" id="precio_c" name="precio_c" placeholder="###,###">
</div>

<div class="mb-3">
  <label for="precio_v" class="form-label">Precio de Venta</label>
  <input  value="{{$productos->precio_v}}" type="number" class="form-control" id="precio_v" name="precio_v" placeholder="###,###">
</div>

<div class="mb-3">
  <label for="proveedor_p" class="form-label">Proveedor que distribuye este producto</label>
  <input  value="{{$productos->proveedor_p}}" type="text" class="form-control" id="proveedor_p" name="proveedor_p" placeholder="">
</div>




<button type="submit" class="btn btn-info"> Actualizar </button>
<a type="button" class="btn btn-primary" href="{{route('productos.index')}}">Volver</a>  

</form>


@endsection