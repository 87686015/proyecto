@extends('plantilla')


@section('titulo')
Productos
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
<a type="button" class="btn btn-primary" href="{{route('productos.nuevo')}}">Nuevo Producto</a> 
</div>
<div class="col">
<form method="Post" action="{{route('productos.index')}}">
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
      <th scope="col">Nombre Producto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio Compra</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>

@forelse($productos as $producto)
<tr>
      <td scope="col">{{$producto->id}}</td>
    
      <td scope="col"><a href="{{route('productos.mostrar',['id'=> $producto->id] )}}" >{{$producto->nombre_p}}</td>
      <td scope="col">{{$producto->categoria_p}}</td>
      <td scope="col">{{$producto->precio_c}}</td>
      <td scope="col">{{$producto->precio_v}}</td>
      <td scope="col">{{$producto->proveedor_p}}</td>
      <td scope="col">  <a type="button" class="btn btn-warning" href="{{route('productos.edit',['id'=> $producto->id] )}}" >Editar</a>  </td>
     <td scope="col" action="{{route('productos.borrar',['id'=> $producto->id] )}}"> 
    
 


                        <form method="post" action="{{route('productos.borrar',['id'=> $producto->id] )}}"  onclick="return confirm('¿Desea eliminar este producto?')">
@csrf
@method('delete')
<input type="submit" value="Eliminar" class="btn btn-danger">
</form>
    </td>
    
    </tr>
@empty
<tr >
<td colspan='8'>No hay productos con esta coincidencia</td>
</tr>
@endforelse
   
  </tbody>
</table>

{{$productos->links()}}

@endsection