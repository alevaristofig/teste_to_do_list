<?php

    namespace App\Repository;

    use App\Http\Requests\ListaTarefaRequest;
    use App\Models\ListaTarefa;

    interface ListaTarefasRepository {

        function salvar(ListaTarefaRequest $dados): ListaTarefa | bool;
    }