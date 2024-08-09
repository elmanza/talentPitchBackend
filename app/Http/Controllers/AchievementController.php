<?php

namespace App\Http\Controllers;

use App\Services\AchievementServices;
use Illuminate\Http\Request;

class AchievementController extends BaseController
{
    protected $achievementServices;
    public function __construct(AchievementServices $achievementServices) {
        parent::__construct();
        $this->achievementServices = $achievementServices;
    }
    public function repository()
    {
        return AchievementServices::class;
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

        $achievement = $this->achievementServices->create($validatedData);

        return response()->json($achievement, 201);
    }
}
