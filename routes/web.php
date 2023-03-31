<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Rutas para el administrador
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Mostrar todos los productos
    Route::get('/admin/products', 'AdminController@index')->name('admin.products.index');
    // Mostrar el formulario para crear un nuevo producto
    Route::get('/admin/products/create', 'AdminController@create')->name('admin.products.create');
    // Guardar un nuevo producto
    Route::post('/admin/products', 'AdminController@store')->name('admin.products.store');
    // Mostrar el formulario para editar un producto
    Route::get('/admin/products/{id}/edit', 'AdminController@edit')->name('admin.products.edit');
    // Actualizar un producto existente
    Route::put('/admin/products/{id}', 'AdminController@update')->name('admin.products.update');
    // Eliminar un producto existente
    Route::delete('/admin/products/{id}', 'AdminController@destroy')->name('admin.products.destroy');
});

// Rutas para los usuarios
Route::group(['middleware' => ['auth']], function () {
    // Mostrar todos los productos
    Route::get('/products', 'UserController@index')->name('user.products.index');
    // Mostrar el formulario para crear un nuevo producto
    Route::get('/products/create', 'UserController@create')->name('user.products.create');
    // Guardar un nuevo producto
    Route::post('/products', 'UserController@store')->name('user.products.store');
    // Mostrar el formulario para editar un producto
    Route::get('/products/{id}/edit', 'UserController@edit')->name('user.products.edit');
    // Actualizar un producto existente
    Route::put('/products/{id}', 'UserController@update')->name('user.products.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
