<?php

namespace App\Http\Controllers;

use App\Services\LanguageServices;
use Illuminate\Http\Request;

class LanguageController extends BaseController
{
    protected $language;
    public function __construct(LanguageServices $language) {
        parent::__construct();
        $this->language = $language;
    }
    public function repository()
    {
        return LanguageServices::class;
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

        $language = $this->language->create($validatedData);

        return response()->json($language, 201);
    }
}
