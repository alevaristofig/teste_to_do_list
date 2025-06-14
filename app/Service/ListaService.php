<?php

    namespace App\Service;

    use App\Repository\ListaRepository;
    use App\Http\Requests\ListaRequest;
    use Illuminate\Http\JsonResponse;
    use App\Models\Lista;
    use App\Exceptions\ApiMessages;

    class ListaService implements ListaRepository {

        private $model;

        public function __construct(Lista $model) {
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

        public function salvar(ListaRequest $request): JsonResponse {
             try {                
                return response()->json($this->model->create($request->all()),201);
            } catch(\Exception $e) {
              //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }    
        }

        public function atualizar(int $id, ListaRequest $request): JsonResponse {
            try {

                $lista = $this->model->find($id);

                $lista->titulo = $request->titulo;

                $lista->save();

                return response()->json($lista,200);

            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }

        public function remover(int $id): JsonResponse {
            try {
                $lista = $this->model->find($id);

                $lista->delete();

                return response()->json(['message' => "Lista removida com Sucesso"],200);
            } catch(\Exception $e) {
                 //  $message = new ApiMessages($e->getMessage());
                return response()->json(['error' => $e->getMessage() /*$message->getMessage()*/], 500);
            }
        }
    }