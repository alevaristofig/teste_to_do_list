<?php

    namespace App\Repository;

    use App\Http\Requests\TarefaRequest;
    use App\Models\Tarefa;

    interface TarefaRepository {

        function salvar(TarefaRequest $dados): Tarefa | bool;
    }