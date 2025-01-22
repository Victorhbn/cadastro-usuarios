<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UsuarioController;


//Route::resource('usuario', UsuarioController::class);




Route::post('usuario',[UsuarioController::class, 'store'])->name('usuario.store');
