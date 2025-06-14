<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{   
    protected $fillable = [
        'titulo'
    ];

    public function tarefas(): HasMany {
        return $this->hasMany(ListaTarefa::class, 'lista_tarefa');
    }
}
