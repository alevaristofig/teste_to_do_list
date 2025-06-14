<?php

    namespace App\Service;

    use App\Repository\ListaTarefasRepository;
    use App\Http\Requests\ListaTarefaRequest;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\ListaTarefa;
    use App\Exceptions\ApiMessages;

    class ListaTarefasService implements ListaTarefasRepository {

        private $model;

        public function __construct(ListaTarefa $model) {
            $this->model = $model;
        }

        public function listar(): Collection {
            try {
                return $this->model->all();
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

        public function salvar(ListaTarefaRequest $request): JsonResponse {
             try {                
                return response()->json($this->model->create($request->all()),200);
            } catch(\Exception $e) {
              //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }    
        }

        public function atualizar(int $id, ListaTarefaRequest $request): JsonResponse {
            try {

                $listaTarefa = $this->model->find($id);

                $listaTarefa->titulo = $request->titulo;

                $listaTarefa->save();

                return response()->json($listaTarefa,200);

            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

        public function remover(int $id): JsonResponse {
            try {
                $listaTarefa = $this->model->find($id);

                $listaTarefa->delete();

                return response()->json(['message' => "Lista removida com Sucesso"],200);
            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }
    }