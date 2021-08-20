<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;


//proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::post('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');

Route::get('/proveedores/{id}', [ProveedoresController::class, 'show'])->name('proveedores.mostrar');

Route::get('/proveedor/crear', [ProveedoresController::class, 'nuevo'])->name('proveedor.nuevo');
Route::post('/proveedores/guardar', [ProveedoresController::class, 'store'])->name('proveedores.guardar');

Route::get('/proveedores/{id}/editar', [ProveedoresController::class, 'edit'])->name('proveedores.edit')->where('id','[0-9]+');
Route::post('/proveedores/{id}/editar', [ProveedoresController::class, 'update'])->name('proveedores.update')->where('id','[0-9]+');

Route::delete('/proveedores/{id}/eliminar', [ProveedoresController::class, 'destroy'])->name('proveedores.borrar')->where('id','[0-9]+');


//clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('/clientes/nuevo', [ClienteController::class, 'nuevo'])->name('clientes.nuevo');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.mostrar');

Route::post('/clientes/guardar', [ClienteController::class, 'store'])->name('cliente.guardar');

Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.edit')->where('id','[0-9]+');
Route::post('/clientes/{id}/editar', [ClienteController::class, 'update'])->name('clientes.update')->where('id','[0-9]+');

Route::delete('/clientes/{id}/eliminar', [ClienteController::class, 'destroy'])->name('clientes.borrar')->where('id','[0-9]+');



//productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/nuevo', [ProductoController::class, 'nuevo'])->name('productos.nuevo');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.mostrar');

Route::post('/productos/guardar', [ProductoController::class, 'store'])->name('productos.guardar');

Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit')->where('id','[0-9]+');
Route::post('/productos/{id}/editar', [ProductoController::class, 'update'])->name('productos.update')->where('id','[0-9]+');

Route::delete('/productos/{id}/eliminar', [ProductoController::class, 'destroy'])->name('productos.borrar')->where('id','[0-9]+');


//ventas
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::post('/ventas', [VentaController::class, 'index'])->name('ventas.index');

Route::get('/ventas/nuevo', [VentaController::class, 'nuevo'])->name('ventas.nuevo');
Route::get('/ventas/{id}', [VentaController::class, 'show'])->name('ventas.mostrar');

Route::post('/ventas/guardar', [VentaController::class, 'store'])->name('ventas.guardar'); 

Route::post('/ventas/addproductoventa', [VentaController::class, 'addproductoventa'])->name('ventas.addproductoventa'); 
Route::post('/ventas/addmasproductoventa', [VentaController::class, 'addmasproductoventa'])->name('ventas.addmasproductoventa'); 
Route::post('/ventas/borrarproductoventa', [VentaController::class, 'borrarproductoventa'])->name('ventas.borrarproductoventa');    

Route::get('/ventas/{id}/editar', [VentaController::class, 'edit'])->name('ventas.edit')->where('id','[0-9]+');
Route::post('/ventas/{id}/editar', [VentaController::class, 'update'])->name('ventas.update')->where('id','[0-9]+');

Route::delete('/ventas/{id}/eliminar', [VentaController::class, 'destroy'])->name('ventas.borrar')->where('id','[0-9]+');
