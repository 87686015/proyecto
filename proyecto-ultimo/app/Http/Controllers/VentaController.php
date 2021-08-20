<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\ProductosVenta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(Request $request){
        $ventas = Venta::where('created_at','like','%'.$request->buscar.'%')->paginate(10);       
        return view('ventas')->with('ventas', $ventas);
   }




       public function show($id){
          $ventas = Venta::findOrFail($id);      
          $productos = Producto::all();
          $productosventas =  ProductosVenta::where('id_venta','=',$id)->get();         
               return view('ventasver')->with('ventas', $ventas)->with('productosventas', $productosventas)->with('productos', $productos);
           }



              
   public function nuevo(){        
       $clientes =  Cliente::all();
      return view('formularioNuevoVentas')->with('clientes', $clientes);
  }



  public function store(Request $request){      
  
      $nuevoVenta = new Venta();
      
   $request->validate([
       'cliente'=>'required',
   ]);  

      $nuevoVenta->cliente = $request->cliente;
      $creado = $nuevoVenta->save();

      if($creado){
        
        $cliente =  Cliente::where('nombre_cliente','=',$request->cliente)->get();
        $productos = Producto::all();
        $idventa = Venta::latest('id')->first();
        $carrito = ProductosVenta::where('id_venta','=',$idventa->id)->get();
        return  view('formularioAgregarProductos')->with('cliente', $cliente)->with('productos', $productos)
                                                ->with('idventa', $idventa)->with('carrito', $carrito);
      }else{
          return "error";
      }    
      
      
     
  }


 public function addproductoventa(Request $request){   

    $precioprod = Producto::where('nombre_p','=',$request->addproducto)->get(); 
    $nuevoVenta = new ProductosVenta();
        $nuevoVenta->id_venta = $request->id_venta;
        $nuevoVenta->producto = $request->addproducto;
        $nuevoVenta->precio = $precioprod[0]->precio_v;
        $creado = $nuevoVenta->save();

       

        if($creado){         
            $cliente =  Cliente::where('id','=',$request->id_clieteform)->get();
            $productos = Producto::all();
            $idventa = Venta::latest('id')->first();
            $carrito = ProductosVenta::where('id_venta','=',$idventa->id)->get();
            return  view('formularioAgregarProductos')->with('cliente', $cliente)->with('productos', $productos)
            ->with('idventa', $idventa)->with('carrito', $carrito);
         
          }else{
              return "error";
          }    
      }







      public function addmasproductoventa(Request $request){   

        $precioprod = Producto::where('nombre_p','=',$request->addproducto)->get(); 
        $nuevoVenta = new ProductosVenta();
            $nuevoVenta->id_venta = $request->id_venta;
            $nuevoVenta->producto = $request->addproducto;
            $nuevoVenta->precio = $precioprod[0]->precio_v;
            $creado = $nuevoVenta->save();
    
           
    
            if($creado){         
                return redirect()->route('ventas.mostrar',['id'=> $request->id_venta]);          
              }else{
                  return "error";
              }    
          }

      





      
      public function borrarproductoventa(Request $request){

        ProductosVenta::destroy($request->id);   
        return redirect()->route('ventas.mostrar',['id'=> $request->id_venta]);   
          }



//   public function edit($id){
//       $ventas = Venta::findOrFail($id);                 
//            return view('formularioEditarVentas')->with('ventas', $ventas);
//        }





    //    public function update(Request $request, $id){
           
    //       $ventas = Venta::findOrFail($id);     

    //       $request->validate([
    //           'cliente'=>'required',
    //       ]);
    //       $ventas->cliente = $request->cliente;
    //       $creado = $ventas->save();

       
    //       if($creado){
    //       return redirect()->route('ventas.index')->with('mensaje','La venta fue modificada exitosamente');
    //       }else{
    //           return 'error';
    //       }           

    //        }

           public function destroy($id){

            Venta::destroy($id);   
              return redirect()->route('ventas.index')->with('mensaje','La venta fue eliminada exitosamente');
              }
}
