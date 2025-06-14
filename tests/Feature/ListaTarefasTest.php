<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\ListaTarefa;

class ListaTarefasTest extends TestCase
{
    public function test_inserirListaDeTarefasSucesso(): void
    {
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

        Mockery::close();
    }
}
