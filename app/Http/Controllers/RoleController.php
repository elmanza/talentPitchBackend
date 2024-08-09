<?php

namespace App\Http\Controllers;

use App\Services\RoleServices;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    protected $roleServices;
    public function __construct(RoleServices $roleServices) {
        parent::__construct();
        $this->roleServices = $roleServices;
    }
    public function repository()
    {
        return RoleServices::class;
    }

    /**
     * Almacena un nuevo registro en la base de datos.
     *
     * Este método valida los datos de entrada, crea un nuevo recurso
     * y devuelve una respuesta JSON con el recurso creado.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $role = $this->roleServices->create($validatedData);

        return response()->json($role, 201);
    }
}
