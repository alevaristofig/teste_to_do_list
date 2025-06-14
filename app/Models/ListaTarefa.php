<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaTarefa extends Model
{
    protected $table = "lista_tarefa";

    protected $fillable = [
        'lista_id', 'tarefa_id'
    ];

     public function lista(): BelongsToMany
    {
        return $this->belongsToMany(Lista::class);
    }

    public function tarefa(): BelongsToMany
    {
        return $this->belongsToMany(Tarefa::class);
    }
}
