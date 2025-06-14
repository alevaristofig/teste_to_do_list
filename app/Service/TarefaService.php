<?php

    namespace App\Service;

    use App\Repository\TarefaRepository;
    use App\Http\Requests\TarefaRequest;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\Tarefa;
    use App\Exceptions\ApiMessages;

    class TarefaService implements TarefaRepository {

        private $model;

        public function __construct(Tarefa $model) {
            $this->model = $model;
        }

        public function salvar(TarefaRequest $dados) {

        }
    }