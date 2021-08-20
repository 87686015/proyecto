@extends('plantilla')


@section('titulo')
Agregar Productos a Venta
@endsection

@section('content')

<h1>Agregar Productos a compra de {{$cliente[0]->nombre_cliente}}</h1>

<br>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul> 
 </div>
@endif

<form method="post" action="{{route('ventas.addproductoventa')}}">
    @csrf

<select class="form-select"  id="addproducto" name="addproducto">
  <option selected>Agregar producto a la compra</option>
  @foreach($productos as $p)
  <option value="{{$p->nombre_p}}">{{$p->nombre_p}}</option>
  @endforeach
</select>

<input name="id_venta" id="id_venta" value="{{$idventa->id}}" hidden>

<input name="id_clieteform" id="id_clieteform" value=" {{$cliente[0]->id}}" hidden>



<br>
<button type="submit" class="btn btn-info"> Agregar producto </button>

</form>







<table class="table table-bordered table-success">
  <thead>
    <tr>
      <th scope="col">Productos de esta venta</th>
      <th scope="col">Precio de este producto</th>
    </tr>
  </thead>
  <tbody>

@forelse($carrito as $car)
<tr>    
      <td scope="col">{{$car->producto}}</td>
      <td scope="col">{{$car->precio}}</td>
 
    
    </tr>
@empty
<tr >
<td colspan='7'>No hay productos anadidos aun</td>
</tr>
@endforelse
   
  </tbody>
</table>



@endsection