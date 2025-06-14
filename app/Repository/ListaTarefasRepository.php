<?php

    namespace App\Repository;

    use App\Http\Requests\ListaTarefaRequest;
    use App\Models\ListaTarefa;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Database\Eloquent\Collection;

    interface ListaTarefasRepository {

        function salvar(ListaTarefaRequest $request): JsonResponse;
        function listar(): Collection;
        function buscar(int $id): JsonResponse;
        function atualizar(int $id, ListaTarefaRequest $request): JsonResponse;
    }