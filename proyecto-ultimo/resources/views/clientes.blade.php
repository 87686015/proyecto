@extends('plantilla')


@section('titulo')
Clientes
@endsection


@section('content')

@if(session('mensaje'))
 <div class="alert alert-success">
    {{session('mensaje')}}
 </div>
@endif

&nbsp;

<div class="row">
<div class="col">
<a type="button" class="btn btn-primary" href="{{route('clientes.nuevo')}}">Nuevo Cliente</a> 
</div>
<div class="col">
<form method="Post" action="{{route('clientes.index')}}">
  @csrf
   <label for="bus" class="form-label">Buscar por nombre</label>
<input name="buscar" id="buscar" >
</form>
</div>
</div>

&nbsp;


<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Cliente</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($clientes as $cliente)
<tr>
      <td scope="col">{{$cliente->id}}</td>
    
      <td scope="col"><a href="{{route('clientes.mostrar',['id'=> $cliente->id] )}}" >{{$cliente->nombre_cliente}}</td>
      <td scope="col">{{$cliente->telefono_cliente}}</td>
      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('clientes.edit',['id'=> $cliente->id] )}}" >Editar</a>  </td>
     <td scope="col" action="{{route('clientes.borrar',['id'=> $cliente->id] )}}"> 
    
 


                        <form method="post" action="{{route('clientes.borrar',['id'=> $cliente->id] )}}"  onclick="return confirm('desea eliminar este cliente?')">
@csrf
@method('delete')
<input type="submit" value="Eliminar" class="btn btn-danger">
</form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='7'>No hay clientes con esta coincidencia</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$clientes->links()}}

@endsection