<?php

namespace App\Http\Controllers;

use App\Services\AudienceCategoryServices;
use Illuminate\Http\Request;

class AudienceCategoryController extends BaseController
{
    protected $audienceCategoryServices;
    public function __construct(AudienceCategoryServices $audienceCategoryServices) {
        parent::__construct();
        $this->audienceCategoryServices = $audienceCategoryServices;
    }

    public function repository()
    {
        return AudienceCategoryServices::class;
    }

    /**
     * Muestra la lista completa
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @example
     * {
     *    "data": [ { AudienceCategory } ]
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

        $audienceCategory = $this->audienceCategoryServices->create($validatedData);

        return response()->json($audienceCategory, 201);
    }
}
