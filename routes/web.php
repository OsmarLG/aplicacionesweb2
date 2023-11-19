<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SvgController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CanvaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EncuestaController;

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

//LOGIN
Route::middleware(['guest'])->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});


//AUTH
Route::middleware(['auth'])->group(function (){
    //HOME
    Route::controller(HomeController::class)->group(function () {
        Route::get('/','index')->name('home');
    });

    //Encuestas
    Route::controller(EncuestaController::class)->group(function (){
        //ADMIN
        Route::middleware(['admin'])->group(function (){
            Route::get('/encuestas', 'index')->name('encuestas');            
        });
        //SURVEY
        Route::middleware(['survey'])->group(function (){
            Route::get('/encuestas/create', 'create')->name('encuestas.create');
            Route::post('/encuestas/create', 'store')->name('encuestas.store');
        });
    });

        //Canvas
        Route::group(['prefix' => 'canvas'], function(){
            Route::controller(CanvaController::class)->group(function (){
                Route::get('/index', 'index')->name('canva.index')->middleware('survey');
                Route::get('/create', 'create')->name('canva.create')->middleware('survey');
                Route::post('/store', 'store')->name('canva.store')->middleware('survey');
                Route::get('/download/{id}', 'download')->name('canva.download');
            });
        });

        Route::group(['prefix' => 'svgs'], function(){
            Route::controller(SvgController::class)->group(function (){
                Route::get('/index', 'index')->name('svg.index')->middleware('survey');
            });
        });

    //LOGOUT
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});