<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UsuarioController extends Controller
{

    public function store(StoreUserRequest $request)
    {
        $user = usuario::create($request->validated());


        if ($user) {
            return response()->json([
                'success'   => true,
                'message'   => 'Usuario Cadastrado com sucesso',
            ], 201);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Erro ao cadastrar Usario',
            ], 500);
        }
    }

}
