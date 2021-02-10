<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\CriterioController;
use App\Http\Controllers\MetadatoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PreguntaDeInvestigacionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RevisionController;
use App\Http\Controllers\PruebaPilotoController;
use App\Models\Biblioteca;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('revisiones/{revision}/protocolo_de_busqueda', [RevisionController::class, 'protocoloBusqueda'])->name('revision.protocoloBusqueda');
Route::post('revisiones/{revision}/protocolo_de_busqueda', [RevisionController::class, 'protocoloBusqueda_store'])->name('protocoloBusqueda.store');


Route::resource('revisiones', RevisionController::class);


Route::get('revisiones/{revision}/preguntas', [PreguntaDeInvestigacionController::class, 'preguntas'])->name('revision.preguntas');
Route::post('revisiones/{revision}/preguntas', [PreguntaDeInvestigacionController::class, 'store'])->name('preguntas.store');


Route::get('revisiones/{revision}/criterios', [CriterioController::class, 'criterios'])->name('revision.criterios');
Route::post('revisiones/{revision}/criterios', [CriterioController::class, 'store'])->name('criterios.store');

Route::get('revisiones/{revision}/formulario_extraccion', [RevisionController::class, 'formulario_extraccion'])->name('revision.formulario_extraccion');
Route::post('revisiones/{revision}/formulario_extraccion', [RevisionController::class, 'formulario_extraccion_store'])->name('formulario_extraccion.store');

Route::post('metadatos/create', [MetadatoController::class, 'store'])->name('metadatos.create');
Route::post('bibliotecas/create', [BibliotecaController::class, 'store'])->name('bibliotecas.create');
Route::post('articulo/create/{revision}', [ArticuloController::class, 'store'])->name('articulo.create');
Route::post('articulo/evaluaciones/store', [EvaluacionController::class, 'store'])->name('evaluaciones.store');
Route::get('articulo/show/{articulo}', [ArticuloController::class, 'show'])->name('articulo.show');




Route::get('revisiones/{revision}/validacion', [RevisionController::class, 'validacion'])->name('revision.validacion');
Route::post('revisiones/{revision}/validacion', [RevisionController::class, 'validacion_store'])->name('validacion.store');


Route::get('revisiones/{revision}/mejora', [RevisionController::class, 'mejora_diseno'])->name('revision.mejora_diseno');
Route::post('revisiones/{revision}/mejora', [RevisionController::class, 'mejora_diseno_store'])->name('revision.mejora_diseno.store');

Route::get('revisiones/{revision}/prueba_piloto', [PruebaPilotoController::class, 'prueba_piloto'])->name('revision.prueba_piloto');
Route::post('revisiones/{revision}/prueba_piloto', [PruebaPilotoController::class, 'prueba_piloto_decision'])->name('revision.prueba_piloto.decision');


Route::get('revisiones/{revision}/prueba_piloto/cargar_articulos', [PruebaPilotoController::class, 'cargar_articulos'])->name('revision.prueba_piloto.cargar_articulos');
Route::get('revisiones/{revision}/prueba_piloto/aplicar_criterios', [PruebaPilotoController::class, 'aplicar_criterios'])->name('revision.prueba_piloto.aplicar_criterios');


Route::get('revisiones/{revision}/prueba_piloto/seleccionar_bibliotecas', [PruebaPilotoController::class, 'seleccionar_bibliotecas'])->name('revision.prueba_piloto.seleccionar_bibliotecas');
Route::post('revisiones/{revision}/prueba_piloto/seleccionar_bibliotecas', [PruebaPilotoController::class, 'bibliotecas_seleccionadas'])->name('revision.prueba_piloto.bibliotecas_seleccionadas');

// Route::post('revisiones/{revision}/mejora', [RevisionController::class, 'validacion_store'])->name('validacion.store');