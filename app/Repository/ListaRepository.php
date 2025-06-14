<?php

    namespace App\Repository;

    use App\Http\Requests\ListaRequest;
    use Illuminate\Http\JsonResponse;

    interface ListaRepository {

        function salvar(ListaRequest $request): JsonResponse;
        function listar(): JsonResponse;
        function buscar(int $id): JsonResponse;
        function atualizar(int $id, ListaRequest $request): JsonResponse;
        function remover(int $id): JsonResponse;
    }