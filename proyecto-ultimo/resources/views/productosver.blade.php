@extends('plantilla')

@section('titulo')
Ver Cliente
@endsection

@section('content')



<h3>Detalles del Producto {{$productos->nombre_p}}</h3>
<a type="button" class="btn btn-warning" href="{{route('productos.edit',['id'=> $productos->id] )}}" >Editar</a>  

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Campo</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>

    <tr>  
      <td scope="col">NOMBRE</td>
      <td scope="col">{{$productos->nombre_p}}</td>
    </tr>


    <tr>
      <td scope="col">CATEGORIA</td>
      <td scope="col">{{$productos->categoria_p}}</td>
    </tr>

<tr>
  <td scope="col">PRECIO COSTO</td>
  <td scope="col">{{$productos->precio_c}}</td>
</tr>

<tr>
  <td scope="col">PRECIO VENTA</td>
  <td scope="col">{{$productos->precio_v}}</td>
</tr>

<tr>
  <td scope="col">PROVEEDOR</td>
  <td scope="col">{{$productos->proveedor_p}}</td>
</tr>


   
  </tbody>
</table>

<a type="button" class="btn btn-primary" href="{{route('productos.index')}}">Volver</a>  


@endsection