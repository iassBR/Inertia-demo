<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'owner_id'];


    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'projeto_id');
    }
}
