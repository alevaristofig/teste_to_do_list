<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;

class ListaTarefasTest extends TestCase
{
    public function test_example(): void
    {
        $dados = [
            'id'=> 1,
            'titulo'=> 'Lista Tarefa Exemplo'
        ];
    }
}
