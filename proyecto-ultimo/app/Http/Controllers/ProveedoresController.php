<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proveedor;


class ProveedoresController extends Controller
{


 


    public function index(Request $request){

         $proveedores = Proveedor::where('nombre_proveedor','like','%'.$request->buscar.'%')->paginate(10);        
             
             return view('proveedores')->with('proveedores', $proveedores);
         }




         public function show($id){
            $proveedores = Proveedor::findOrFail($id);
                 
                 return view('proveedorver')->with('proveedores', $proveedores);
             }



                
     public function nuevo(){          
        return view('formularioNuevoProveedor');
    }



    public function store(Request $request){    
             
      
        $nuevoProveedor = new Proveedor();
        $request->validate([
            'nombre'=>'required|unique:proveedors,nombre_proveedor',
            'correo'=>'required|unique:proveedors,correo',
            'contacto'=>'required',
            'telefono'=>'required|numeric|unique:proveedors,telefono'
        ]);
        $nuevoProveedor->nombre_proveedor = $request->nombre;
        $nuevoProveedor->nombre_del_contacto = $request->contacto;
        $nuevoProveedor->telefono = $request->telefono;
        $nuevoProveedor->correo = $request->correo;
        $creado = $nuevoProveedor->save();

        if($creado){

        return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue registrado exitosamente');
        }else{
            return "hola";
        }           

    
    }





    public function edit($id){
        $proveedores = Proveedor::findOrFail($id);                 
             return view('formularioEditarProveedores')->with('proveedores', $proveedores);
         }





         public function update(Request $request, $id){
             
            $proveedores = Proveedor::findOrFail($id);     

            $request->validate([
                'nombre'=>'required',
                'correo'=>'required',
                'contacto'=>'required',
                'telefono'=>'required|numeric'
            ]);
            $proveedores->nombre_proveedor = $request->nombre;
            $proveedores->correo = $request->correo;
            $proveedores->telefono = $request->telefono;
            $proveedores->nombre_del_contacto = $request->contacto;
            $creado = $proveedores->save();

         
            if($creado){
            return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue modificado exitosamente');
            }else{
                return 'error';
            }           

             }

             public function destroy($id){

                Proveedor::destroy($id);   
                return redirect()->route('proveedores.index')->with('mensaje','El proveedor fue eliminado exitosamente');
                }


        
}
