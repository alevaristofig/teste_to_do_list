<?php

    namespace App\Service;

    use App\Repository\ListaTarefaRepository;
    use App\Http\Requests\ListaTarefaRequest;
    use Illuminate\Http\JsonResponse;
    use App\Models\ListaTarefa;
    use App\Exceptions\ApiMessages;

    class ListaTarefaService implements ListaTarefaRepository {

        private $model;

        public function __construct(ListaTarefa $model) {
            $this->model = $model;
        }

        public function salvar(ListaTarefaRequest $request): JsonResponse {
             try {                
                return response()->json($this->model->create($request->all()),201);
            } catch(\Exception $e) {
              //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }    
        }
    }