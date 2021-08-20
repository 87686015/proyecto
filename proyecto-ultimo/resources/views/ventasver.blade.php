@extends('plantilla')

@section('titulo')
Ver Cliente
@endsection

@section('content')



<h3>Detalles factura # {{$ventas->id}}  del cliente {{$ventas->cliente}}</h3>





<form method="post" action="{{route('ventas.addmasproductoventa')}}">
    @csrf
<div class="row">
<div class="col">
     <label for="addproducto" class="form-label">Elije un producto para agregar a esta factura </label>
</div>
<div class="col">
  <select class="form-select"  id="addproducto" name="addproducto">
  <option selected>Agregar producto a la compra</option>
  @foreach($productos as $p)
  <option value="{{$p->nombre_p}}">{{$p->nombre_p}}</option>
  @endforeach
</select>
</div>
<div class="col">
<input name="id_venta" id="id_venta" value="{{$ventas->id}}" hidden>
<button type="submit" class="btn btn-info"> Agregar producto </button>
</div>
</div>
<br>

</form>








<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php $total = 0;   ?>
@foreach($productosventas as $prod)
<?php $total = $total+ $prod->precio;   ?>
    <tr>  
      <td scope="col">{{$prod->producto}}</td>
      <td scope="col">{{$prod->precio}}</td>   
       <td scope="col" > 
    <form method="post" action="{{route('ventas.borrarproductoventa')}}"  onclick="return confirm('seguro que desea eliminar esta compra')">
@csrf
<input name="id_venta" value="{{$prod->id_venta}}" hidden>
<input name="id" value="{{$prod->id}}" hidden>
<input type="submit" value="Eliminar" class="btn btn-danger">
</form>
</td>
    </tr>
@endforeach




   
  </tbody>
</table>

<label for="total" class="form-label">TOTAL VENTA </label>
<input value={{$total}} readonly>

<a type="button" class="btn btn-primary" href="{{route('ventas.index')}}">Volver</a>  


@endsection