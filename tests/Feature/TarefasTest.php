<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\Tarefa;

class TarefasTest extends TestCase
{

    public function test_inserirTarefasSucesso(): void
    {        
        $dados = [
            'id'=> 1,
            'titulo'=> 'Tarefa Exemplo'
        ];

        $mock = Mockery::mock('alias' . Tarefa::class);
        $mock->shouldReceive('create')
             ->once()
             ->with($dados)
             ->andReturn((object) $dados);

        $result = Tarefa::create($dados);

        $this->assertEquals('Tarefa Exemplo',$result->titulo);
        $this->assertEquals(1,$result->id);
    }
}
