<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\ListaTarefaRequest;
use App\Service\ListaTarefasService;
use App\Models\ListaTarefa;

class ListaTarefaController extends Controller
{

    private $service;

    public function __construct(ListaTarefasService $service) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
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
    public function store(ListaTarefaRequest $request): JsonResponse
    {
        return $this->service->salvar($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): ListaTarefa | null
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
