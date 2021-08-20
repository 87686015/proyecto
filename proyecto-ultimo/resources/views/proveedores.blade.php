@extends('plantilla')


@section('titulo')
Proveedores
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



<a type="button" class="btn btn-primary" href="{{route('proveedor.nuevo')}}">Nuevo proveedor</a> 



</div>
<div class="col">
<form method="Post" action="{{route('proveedores.index')}}">
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
      <th scope="col">Nombre Proveedor</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Nombre del contacto</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($proveedores as $proveedor)
<tr>
      <td scope="col">{{$proveedor->id}}</td>
    
      <td scope="col"><a href="{{route('proveedores.mostrar',['id'=> $proveedor->id] )}}" >{{$proveedor->nombre_proveedor}}</td>
      <td scope="col">{{$proveedor->correo}}</td>
      <td scope="col">{{$proveedor->telefono}}</td>
      <td scope="col">{{$proveedor->nombre_del_contacto}}</td>
      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('proveedores.edit',['id'=> $proveedor->id] )}}" >Editar</a>  </td>
     <td scope="col" action="{{route('proveedores.borrar',['id'=> $proveedor->id] )}}"> 
    
 


                        <form method="post" action="{{route('proveedores.borrar',['id'=> $proveedor->id] )}}"  onclick="return confirm('desea eliminar este proveedor?')">
@csrf
@method('delete')
<input type="submit" value="Eliminar" class="btn btn-danger">
</form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='7'>No hay proveedores con esta coincidencia</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$proveedores->links()}}

@endsection