<?php

    namespace App\Repository;

    use App\Http\Requests\TarefaRequest;
    use App\Models\Tarefa;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Database\Eloquent\Collection;

    interface TarefaRepository {

        function salvar(TarefaRequest $request): JsonResponse;
        function listar(): JsonResponse;
       // function buscar(int $id): JsonResponse;
      //  function atualizar(int $id, TarefaRequest $request): JsonResponse;
      //  function remover(int $id): JsonResponse;
    }