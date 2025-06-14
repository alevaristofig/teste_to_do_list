<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaTarefa extends Model
{
    protected $table = "listatarefas";

    protected $fillable = [
        'titulo'
    ];
}
