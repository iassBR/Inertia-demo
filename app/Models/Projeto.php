<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'owner_id'];

    protected $with = ['tarefas'];


    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'projeto_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
