@extends('plantilla')

@section('titulo')
Ver Cliente
@endsection

@section('content')



<h3>Detalles del cliente {{$clientes->nombre_cliente}}</h3>
<a type="button" class="btn btn-warning" href="{{route('clientes.edit',['id'=> $clientes->id] )}}" >Editar</a>  

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
      <td scope="col">{{$clientes->nombre_cliente}}</td>
    </tr>


    <tr>
      <td scope="col">TELEFONO</td>
      <td scope="col">{{$clientes->telefono_cliente}}</td>
    </tr>


   
  </tbody>
</table>

<a type="button" class="btn btn-primary" href="{{route('clientes.index')}}">Volver</a>  


@endsection