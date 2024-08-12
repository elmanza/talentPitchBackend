<?php

namespace App\Http\Controllers;

use App\Services\MainGoalServices;
use Illuminate\Http\Request;

class MainGoalController extends BaseController
{
    protected $mainGoalServices;
    public function __construct(MainGoalServices $mainGoalServices) {
        parent::__construct();
        $this->mainGoalServices = $mainGoalServices;
    }
    public function repository()
    {
        return MainGoalServices::class;
    }

    /**
     * Muestra la lista completa
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @example
     * {
     *    "data": [ { MainGoal } ]
     * }
     */
    public function index(Request $request)
    {
        return response()->json([
            'data' => $this->repo->all()
        ]);
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

        $mainGoal = $this->mainGoalServices->create($validatedData);

        return response()->json($mainGoal, 201);
    }
}
