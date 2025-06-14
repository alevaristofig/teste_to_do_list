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

        public function listar(): JsonResponse {
            try {
                return response()->json($this->model->all(),200);
            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

         public function buscar(int $id): JsonResponse {
            try {
                return response()->json($this->model->find($id),200);                
            } catch(\Exception $e) {
                //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

        public function salvar(TarefaRequest $request): JsonResponse {
             try {
                return response()->json($this->model->create($request->all()),201);
            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

        public function atualizar(int $id, TarefaRequest $request): JsonResponse {
            try {

                $tarefa = $this->model->find($id);

                $tarefa->titulo = $request->titulo;
                $tarefa->tempo = $request->tempo;
                $tarefa->dificuldade = $request->dificuldade;

                $tarefa->save();

                return response()->json($tarefa,200);

            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

        public function remover(int $id): JsonResponse {
            try {
                $listaTarefa = $this->model->find($id);

                $listaTarefa->delete();

                return response()->json(['message' => "Tarefa removida com Sucesso"],200);
            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }
    }