<?php

    namespace App\Repository;

    use App\Http\Requests\TarefaRequest;
    use App\Models\Tarefa;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Database\Eloquent\Collection;

    interface TarefaRepository {

        function salvar(TarefaRequest $request): JsonResponse;
    }