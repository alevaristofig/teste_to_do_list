<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TarefaRequest;
use App\Service\TarefaService;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    private $service;

    public function __construct(TarefaService $service) {
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
    public function store(TarefaRequest $request): JsonResponse
    {        
        return $this->service->salvar($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
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
    public function update(TarefaRequest $request, int $id)
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
