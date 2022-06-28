<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministracionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    if(session()->has('authSesionLogin')){
        return view('home');
    }

    return view('auth.login');
})->name('login');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::post('/auth', [LoginController::class, 'authLogin'])->name('authLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['AuthSesion']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Empresas
    Route::get('/empresas', [App\Http\Controllers\AdministracionController::class, 'empresas'])->name('empresas');
    Route::post('/registerEmpresa', [App\Http\Controllers\AdministracionController::class, 'registerEmpresa'])->name('registerEmpresa');
    Route::post('/updateEmpresa', [App\Http\Controllers\AdministracionController::class, 'updateEmpresa'])->name('updateEmpresa');
    Route::post('/deleteEmpresa', [App\Http\Controllers\AdministracionController::class, 'deleteEmpresa'])->name('deleteEmpresa');
    //Tipo sedes
    Route::get('/tipoSedes', [App\Http\Controllers\AdministracionController::class, 'tipoSedes'])->name('tipoSedes');
    Route::post('/registerTipoSede', [App\Http\Controllers\AdministracionController::class, 'registerTipoSede'])->name('registerTipoSede');
    Route::post('/updateTipoSede', [App\Http\Controllers\AdministracionController::class, 'updateTipoSede'])->name('updateTipoSede');
    Route::post('/deleteTipoSede', [App\Http\Controllers\AdministracionController::class, 'deleteTipoSede'])->name('deleteTipoSede');
    //sedes
    Route::get('/sedes', [App\Http\Controllers\AdministracionController::class, 'sedes'])->name('sedes');
    Route::post('/registerSede', [App\Http\Controllers\AdministracionController::class, 'registerSede'])->name('registerSede');
    Route::post('/updateSede', [App\Http\Controllers\AdministracionController::class, 'updateSede'])->name('updateSede');
    Route::post('/deleteSede', [App\Http\Controllers\AdministracionController::class, 'deleteSede'])->name('deleteSede');

    Route::get('/usuarios', [App\Http\Controllers\AdministracionController::class, 'usuarios'])->name('usuarios');
});

