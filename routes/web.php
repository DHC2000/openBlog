<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\EtiquetaController;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/Nota/list', function () {
    return view('crud.viewList');
});

Route::resource('/Nota',NotaController::class);
Route::get('/Nota/create', [App\Http\Controllers\NotaController::class, 'viewCreate']);
Route::get('/Nota/edit', [App\Http\Controllers\NotaController::class, 'viewEdit']);
Route::get('/Nota/{Notum}/addTags', [App\Http\Controllers\NotaController::class, 'viewAddTags']);
Route::post('/Nota/join', [App\Http\Controllers\NotaController::class, 'join']);
Route::post('/Nota/deljoin', [App\Http\Controllers\NotaController::class, 'deljoin']);

Route::get('Nota/{Notum}/notaPDF',[NotaController::class,'printPDF']);

Route::resource('/Tags',EtiquetaController::class);
Route::get('/Tags/create', [App\Http\Controllers\EtiquetaController::class, 'viewCreate']);
Route::get('/Tags/edit', [App\Http\Controllers\EtiquetaController::class, 'viewEdit']);
Route::get('/Tags/{Tag}/Notas_Etiquetas', [App\Http\Controllers\EtiquetaController::class, 'viewTags']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();
        $notas= DB::table('notas')->orderByDesc('id')->get();
        return view('home',compact('notas','et','ets_nts'));
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
