<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UsuarioController;


Route::post('usuario',[UsuarioController::class, 'store'])->name('usuario.store');
