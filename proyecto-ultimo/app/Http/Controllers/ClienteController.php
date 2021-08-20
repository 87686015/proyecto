<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
  
    public function index(Request $request){
         $clientes = Cliente::where('nombre_cliente','like','%'.$request->buscar.'%')->paginate(10);       
         return view('clientes')->with('clientes', $clientes);
    }




        public function show($id){
           $clientes = Cliente::findOrFail($id);                
                return view('clientesver')->with('clientes', $clientes);
            }



               
    public function nuevo(){             
       return view('formularioNuevoCliente');
   }



   public function store(Request $request){      
   
       $nuevoCliente = new Cliente();
       
    $request->validate([
        'nombre'=>'required|unique:clientes,nombre_cliente',
        'telefono'=>'required|numeric|unique:clientes,telefono_cliente'
    ]);  

       $nuevoCliente->nombre_cliente = $request->nombre;
       $nuevoCliente->telefono_cliente = $request->telefono;
       $creado = $nuevoCliente->save();

       if($creado){

       return redirect()->route('clientes.index')->with('mensaje','El cliente fue registrado exitosamente');
       }else{
           return "error";
       }          
   }





   public function edit($id){
       $clientes = Cliente::findOrFail($id);                 
            return view('formularioEditarClientes')->with('clientes', $clientes);
        }





        public function update(Request $request, $id){
            
           $clientes = Cliente::findOrFail($id);     

           $request->validate([
               'nombre'=>'required',
               'telefono'=>'required|numeric'
           ]);
           $clientes->nombre_cliente = $request->nombre;
           $clientes->telefono_cliente = $request->telefono;
           $creado = $clientes->save();

        
           if($creado){
           return redirect()->route('clientes.index')->with('mensaje','El cliente fue modificado exitosamente');
           }else{
               return 'error';
           }           

            }

            public function destroy($id){

               Cliente::destroy($id);   
               return redirect()->route('clientes.index')->with('mensaje','El cliente fue eliminado exitosamente');
               }
}
