@extends('plantilla')

@section('titulo')
Ver Proveedor
@endsection

@section('content')



<h3>Detalles del proveedor {{$proveedores->nombre}}</h3>

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
      <td scope="col">{{$proveedores->nombre_proveedor}}</td>
    </tr>

    <tr>
      <td scope="col">CORREO</td>
      <td scope="col">{{$proveedores->correo}}</td>
    </tr>

    <tr>
      <td scope="col">TELEFONO</td>
      <td scope="col">{{$proveedores->telefono}}</td>
    </tr>

    <tr>
      <td scope="col">NOMBRE DEL CONTACTO</td>
      <td scope="col">{{$proveedores->nombre_del_contacto}}</td>
    </tr>



   

   

   
  </tbody>
</table>

<a type="button" class="btn btn-primary" href="{{route('proveedores.index')}}">Volver</a>  


@endsection