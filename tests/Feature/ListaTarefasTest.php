<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\ListaTarefa;

class ListaTarefasTest extends TestCase
{
    public function test_inserirListaDeTarefasSucesso(): void {
        $dados = [
            'id'=> 1,
            'titulo'=> 'Lista Tarefa Exemplo'
        ];

        $mock = Mockery::mock('alias' . ListaTarefa::class);
        $mock->shouldReceive('create')
             ->once()
             ->with($dados)
             ->andReturn((object) $dados);

        $result = ListaTarefa::create($dados);

        $this->assertEquals('Lista Tarefa Exemplo Exemplo',$result->titulo);
        $this->assertEquals(1,$result->id);

       // Mockery::close();
    }

    public function test_buscarListaDeTarefasSucesso(): void {

        $id = 1;
        $lista = new ListaTarefa();

        $lista->id = 1;
        $lista->titulo = "Buscar Lista Tarefa Exemplo";

        $mock = Mockery::mock('alias:' . ListaTarefa::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $result = ListaTarefa::find($id);

        $this->assertEquals(1,$result->id);
        $this->assertEquals('Buscar Lista Tarefa Exemplo',$result->titulo);
    }

    public function test_atualizarListaDeTarefasSucesso(): void {

        $id = 1;
        $lista = new ListaTarefa();
        $lista->titulo = "Atualizar Lista Tarefa Exemplo";

        $mock = Mockery::mock('alias:' . ListaTarefa::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $listaUpdate = ListaTarefa::find($id);
        
        $listaUpdate->titulo = "Atualizar Lista Tarefa Exemplo 2";

        $mock->shouldReceive('create')
            ->once()
            ->with($listaUpdate)
            ->andReturn($listaUpdate);

        $result = ListaTarefa::create($listaUpdate);

        $this->assertInstanceOf(ListaTarefa::class,$result);
        $this->assertEquals("Atualizar Lista Tarefa Exemplo 2",$result->titulo);        
    }

    public function test_deletarListaDeTarefasSucesso(): void {

        $id = 1;
        $mock = Mockery::mock('alias:' . ListaTarefa::class);     

        $mock->shouldReceive('delete')
            ->once()
            ->with($id)
            ->andReturnTrue();

        $result = ListaTarefa::delete($id);
       
        $this->assertTrue($result);                
    }
}
