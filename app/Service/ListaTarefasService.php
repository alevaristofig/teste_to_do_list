<?php

    namespace App\Service;

    use App\Repository\ListaTarefasRepository;
    use App\Http\Requests\ListaTarefasRequest;
    use Illuminate\Http\JsonResponse;
    use App\Models\ListaTarefa;
    use App\Exceptions\ApiMessages;

    class ListaTarefasService implements ListaTarefasRepository {

        private $model;

        public function __construct(ListaTarefa $model) {
            $this->model = $model;
        }

        public function salvar(ListaTarefasRequest $request) {
             try {
                return response()->json($this->model->create($request->all()),200);
            } catch(\Exception $e) {
                $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $message->getMessage()], 401);
            }    
        }
    }