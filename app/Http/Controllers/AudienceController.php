<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AudienceServices;

class AudienceController extends BaseController
{
    protected $audienceServices;
    public function __construct(AudienceServices $audienceServices) {
        parent::__construct();
        $this->audienceServices = $audienceServices;
    }

    public function repository()
    {
        return AudienceServices::class;
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
            'audience_category_id' => 'required|exists:audience_categories,id',
        ]);

        $audience = $this->audienceServices->create($validatedData);

        return response()->json($audience, 201);
    }
}
