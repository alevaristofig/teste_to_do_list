<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\Tarefa;

class TarefasTest extends TestCase
{

    public function test_inserirTarefasSucesso(): void {        
        $dados = [
            'id'=> 1,
            'titulo'=> 'Tarefa Exemplo',
            'tempo' => '1 dia',
            'dificuldade' => 5
        ];

        $mock = Mockery::mock('alias' . Tarefa::class);
        $mock->shouldReceive('create')
             ->once()
             ->with($dados)
             ->andReturn((object) $dados);

        $result = Tarefa::create($dados);

        $this->assertEquals('Tarefa Exemplo',$result->titulo);
        $this->assertEquals(1,$result->id);

        Mockery::close();
    }

    public function test_buscarTarefaSucesso(): void {

        $id = 1;
        $lista = new \stdClass();

        $lista->id = 1;
        $lista->titulo = "Buscar Tarefa Exemplo";
        $lista->tempo = "1 dia";
        $lista->dificuldade = 5;

        $mock = Mockery::mock('alias:' . Tarefa::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $result = Tarefa::find($id);

        $this->assertEquals(1,$result->id);
        $this->assertEquals('Buscar Tarefa Exemplo',$result->titulo);
    }

    public function test_atualizarTarefasSucesso(): void {

        $id = 1;
        $lista = new Tarefa();//new \stdClass();
        $lista->titulo = "Atualizar Tarefa Exemplo";
        $lista->tempo = "1 dia";
        $lista->dificuldade = 5;

        $mock = Mockery::mock('alias:' . Tarefa::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $listaUpdate = Tarefa::find($id);
        
        $listaUpdate->titulo = "Atualizar Tarefa Exemplo 2";
        $listaUpdate->tempo = "3 dia";
        $listaUpdate->dificuldade = 3;

        $mock->shouldReceive('create')
            ->once()
            ->with($listaUpdate)
            ->andReturn($listaUpdate);

        $result = Tarefa::create($listaUpdate);

        $this->assertInstanceOf(Tarefa::class,$result);
        $this->assertEquals("3 dia",$result->tempo);        
    }
}
