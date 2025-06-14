<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\Lista;

class ListaTest extends TestCase
{
    public function test_inserirListaDeTarefasSucesso(): void {
        $dados = [
            'id'=> 1,
            'titulo'=> 'Lista Tarefa Exemplo'
        ];

        $mock = Mockery::mock('alias' . Lista::class);
        $mock->shouldReceive('create')
             ->once()
             ->with($dados)
             ->andReturn((object) $dados);

        $result = Lista::create($dados);

        $this->assertEquals('Lista Tarefa Exemplo Exemplo',$result->titulo);
        $this->assertEquals(1,$result->id);

        Mockery::close();
    }

    public function test_buscarListaDeTarefasSucesso(): void {

        $id = 1;
        $lista = new \stdClass();

        $lista->id = 1;
        $lista->titulo = "Buscar Lista Tarefa Exemplo";

        $mock = Mockery::mock('alias:' . Lista::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $result = Lista::find($id);

        $this->assertEquals(1,$result->id);
        $this->assertEquals('Buscar Lista Tarefa Exemplo',$result->titulo);
    }

    public function test_atualizarListaDeTarefasSucesso(): void {

        $id = 1;
        $lista = new Lista();//new \stdClass();
        $lista->titulo = "Atualizar Lista Tarefa Exemplo";

        $mock = Mockery::mock('alias:' . Lista::class);
        $mock->shouldReceive('find')
            ->once()    
            ->with($id)        
            ->andReturn($lista);

        $listaUpdate = Lista::find($id);
        
        $listaUpdate->titulo = "Atualizar Lista Tarefa Exemplo 2";

        $mock->shouldReceive('create')
            ->once()
            ->with($listaUpdate)
            ->andReturn($listaUpdate);

        $result = Lista::create($listaUpdate);

        $this->assertInstanceOf(Lista::class,$result);
        $this->assertEquals("Atualizar Lista Tarefa Exemplo 2",$result->titulo);        
    }

    public function test_deletarListaDeTarefasSucesso(): void {

        $id = 1;
        $mock = Mockery::mock('alias:' . Lista::class);     

        $mock->shouldReceive('delete')
            ->once()
            ->with($id)
            ->andReturnTrue();

        $result = Lista::delete($id);
       
        $this->assertTrue($result);                
    }
}
