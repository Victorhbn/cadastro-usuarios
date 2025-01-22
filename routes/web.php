<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\UsuarioController;

Route::get('/', function () {
    return redirect()->route('usuario.create');
});

Route::get('usuario',[UsuarioController::class,'index'])->name('usuario.create');

require __DIR__.'/auth.php';
