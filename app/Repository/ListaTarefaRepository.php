<?php

    namespace App\Repository;

    use App\Http\Requests\ListaTarefaRequest;
    use Illuminate\Http\JsonResponse;

    interface ListaTarefaRepository {

        function salvar(ListaTarefaRequest $request): JsonResponse;
      //  function listar(): JsonResponse;
      //  function buscar(int $id): JsonResponse;
      //  function atualizar(int $id, ListaRequest $request): JsonResponse;
      //  function remover(int $id): JsonResponse;
    }