<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    public function index(Request $request){
        $productos = Producto::where('nombre_p','like','%'.$request->buscar.'%')->paginate(10);       
        return view('productos')->with('productos', $productos);
   }




       public function show($id){
          $productos = Producto::findOrFail($id);                
               return view('productosver')->with('productos', $productos);
           }



              
   public function nuevo(){            
    $proveedores = Proveedor::All();
      return view('formularioNuevoProducto')->with('proveedores', $proveedores);
  }



  public function store(Request $request){          
      $nuevoProducto = new Producto();
      $request->validate([
        'nombre_p'=>'required|unique:productos,nombre_p',
        'categoria_p'=>'required',
        'precio_c'=>'required|numeric|min:0|max:999999',
        'precio_v'=>'required|numeric|min:0|max:999999',
        'proveedor_p'=>'required'
    ]);
      $nuevoProducto->nombre_p = $request->nombre_p;
      $nuevoProducto->categoria_p = $request->categoria_p;
      $nuevoProducto->precio_c = $request->precio_c;
      $nuevoProducto->precio_v = $request->precio_v;
      $nuevoProducto->proveedor_p = $request->proveedor_p;
      $creado = $nuevoProducto->save();

      if($creado){

      return redirect()->route('productos.index')->with('mensaje','El producto fue registrado exitosamente');
      }else{
          return "error";
      }          
  }





  public function edit($id){
      $productos = Producto::findOrFail($id);                 
           return view('formularioEditarProductos')->with('productos', $productos);
       }





       public function update(Request $request, $id){
           
          $productos = Producto::findOrFail($id);     

          $request->validate([
              'nombre_p'=>'required',
              'categoria_p'=>'required',
              'precio_c'=>'required|numeric',
              'precio_v'=>'required|numeric',
              'proveedor_p'=>'required'
          ]);

            $productos->nombre_p = $request->nombre_p;
            $productos->categoria_p = $request->categoria_p;
            $productos->precio_c = $request->precio_c;
            $productos->precio_v = $request->precio_v;
            $productos->proveedor_p = $request->proveedor_p;
          $creado = $productos->save();

       
          if($creado){
          return redirect()->route('productos.index')->with('mensaje','El producto fue modificado exitosamente');
          }else{
              return 'error';
          }           

           }

           public function destroy($id){

            Producto::destroy($id);   
              return redirect()->route('productos.index')->with('mensaje','El producto fue eliminado exitosamente');
              }
}
