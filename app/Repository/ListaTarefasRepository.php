<?php

    namespace App\Repository;

    use App\Http\Requests\ListaTarefaRequest;
    use App\Models\ListaTarefa;
    use Illuminate\Http\JsonResponse;

    interface ListaTarefasRepository {

        function salvar(ListaTarefaRequest $request): JsonResponse;
    }