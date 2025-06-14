<?php

    namespace App\Repository;

    use App\Http\Requests\ListaTarefaRequest;
    use App\Models\ListaTarefa;
    use Illuminate\Http\JsonResponse;

    interface ListaTarefasRepository {

        function salvar(ListaTarefaRequest $request): JsonResponse;
        function listar(): JsonResponse;
        function buscar(int $id): JsonResponse;
        function atualizar(int $id, ListaTarefaRequest $request): JsonResponse;
        function remover(int $id): JsonResponse;
    }