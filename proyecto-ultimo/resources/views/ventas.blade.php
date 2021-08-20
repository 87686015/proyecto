@extends('plantilla')


@section('titulo')
Ventas
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
<a type="button" class="btn btn-primary" href="{{route('ventas.nuevo')}}">Nueva Venta</a> 
</div>
<div class="col">
<form method="Post" action="{{route('ventas.index')}}">
  @csrf
   <label for="bus" class="form-label">Buscar por dia</label>
<input type="date" name="buscar" id="buscar" >
<input class="btn btn-success" value="buscar" type="submit">
</form>
</div>
</div>

&nbsp;


<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha y hora de la venta</th>
      <th scope="col">Nombre Cliente</th>
      <th scope="col">Factura</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($ventas as $venta)
<tr>
      <td scope="col">{{$venta->id}}</td>
      <td scope="col">{{$venta->created_at}}</td>
    
      <td scope="col">{{$venta->cliente}}</td>
      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('ventas.mostrar',['id'=> $venta->id] )}}"  >Ver y Agregar mas productos</a>  </td>

      <!-- <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('ventas.edit',['id'=> $venta->id] )}}" >Editar</a>  </td> -->
     <td scope="col" action="{{route('ventas.borrar',['id'=> $venta->id] )}}"> 
    
 


                        <form method="post" action="{{route('ventas.borrar',['id'=> $venta->id] )}}"  onclick="return confirm('desea eliminar esta venta?')">
@csrf
@method('delete')
<input type="submit" value="Eliminar" class="btn btn-danger">
</form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='7'>No hay ventas con esta coincidencia</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$ventas->links()}}

@endsection