<?php

namespace App\Http\Controllers;

use App\Services\interfaces\IBase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

abstract class BaseController extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->makeRepository();
    }

    /**
     * Especifica la clase de repositorio que debe ser utilizada.
     *
     * @return mixed
     */
    abstract public function repository();

    /**
     * Inicializa el repositorio especificado en el método repository().
     *
     * Este método utiliza el contenedor de servicios de Laravel para
     * instanciar la clase de repositorio y la asigna a la propiedad $repo.
     *
     * @throws \Exception
     */
    private function makeRepository()
    {
        $this->repo = App::make($this->repository());

        if (!$this->repo instanceof IBase) {
            throw new \Exception("Class {$this->repository()} must be an instance of App\\Services\\interfaces\\IBase");
        }
    }

    /**
     * Muestra una lista paginada
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return $this->repo->paginate($perPage);
    }

    /**
     * Muestra un recurso específico por su ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->repo->find($id);
    }

    /**
     * Obtiene todos los recursos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(Request $request)
    {
        return $this->repo->all();
    }

    /**
     * Almacena un nuevo recurso en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        return $this->repo->create($data);
    }

    /**
     * Actualiza un recurso en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        return $this->repo->update($data, $id);
    }

    /**
     * Elimina un recurso específico de la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        // $userId = $request->user()->getIdentifier();
        $res = $this->repo->delete($id, null);
        if($res){
            return response()->json([
                "status" => 200,
                "description" => "Eliminado de la Base de datos correctamente"
            ]);
        }
        return response()->json([
            "status" => 500,
            "description" => "Error al eliminar el recurso"
        ]);
    }
}
