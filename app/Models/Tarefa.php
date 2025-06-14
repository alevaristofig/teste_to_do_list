<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'titulo', 'tempo', 'dificuldade'
    ];

    public function listas(): BelongsToMany {
        return $this->belongsToMany(ListaTarefa::class, 'lista_tarefa');
    }
}
