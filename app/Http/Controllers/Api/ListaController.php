<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ListaRequest;
use App\Service\ListaService;
use App\Models\Lista;

class ListaController extends Controller
{

    private $service;

    public function __construct(ListaService $service) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->service->listar();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListaRequest $request): JsonResponse
    {
        return $this->service->salvar($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return $this->service->buscar($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListaRequest $request, int $id): JsonResponse
    {
        return $this->service->atualizar($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
         return $this->service->remover($id);
    }
}
