@extends('plantilla')


@section('titulo')
Nuevo Producto
@endsection

@section('content')

<h1>Nuevo Producto</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('productos.guardar')}}">
    @csrf

<div class="mb-3">
  <label for="nombre_p" class="form-label">Nombre </label>
  <input type="text" maxlength="50"  class="form-control" id="nombre_p" name="nombre_p" placeholder="Escriba el nombre del producto">
</div>


<div class="mb-3">
  <label for="categoria_p" class="form-label">Categoria</label>
  <input type="text" maxlength="50"  class="form-control" id="categoria_p" name="categoria_p" placeholder="#### ####">
</div>

<div class="mb-3">
  <label for="precio_c" class="form-label">Precio de Compra</label>
  <input type="number"  class="form-control" id="precio_c" name="precio_c" placeholder="###,###">
</div>

<div class="mb-3">
  <label for="precio_v" class="form-label">Precio de Venta</label>
  <input type="number"  class="form-control" id="precio_v" name="precio_v" placeholder="###,###">
</div>



<select class="form-select"  id="proveedor_p" name="proveedor_p">
  <option selected>Proveedor que distribuye este producto</option>
  @foreach($proveedores as $p)
  <option value="{{$p->nombre_proveedor}}">{{$p->nombre_proveedor}}</option>
  @endforeach
</select>


<button type="submit" class="btn btn-info"> Guardar </button>
<button type="reset" class="btn btn-danger"> Reestablecer </button>

</form>


@endsection