<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Models\ListaTarefa;

class ListaTarefaTest extends TestCase
{
    public function test_inserirListaTarefasSucesso(): void
    {
        $dados = [
            'lista_id'=> 1,
            'tarefa_id'=> 1
        ];

        $mock = Mockery::mock('alias' . ListaTarefa::class);
        $mock->shouldReceive('create')
             ->once()
             ->with($dados)
             ->andReturn((object) $dados);

        $result = ListaTarefa::create($dados);

        $this->assertEquals(1,$result->lista_id);
        $this->assertEquals(1,$result->tarefa_id);

        Mockery::close();
    }
}
