<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjetoTarefasController extends Controller
{
    public function store(Projeto $projeto, Request $request)
    {
        $attributes = $request->validate(['descricao' => 'required']);
        
        $projeto->tarefas()->create($attributes);

        return redirect()->back();
    }

   public function completarTarefa(Tarefa $tarefa)
   {
       $tarefa->completar();

       return Redirect::back();
   }

   public function descompletarTarefa(Tarefa $tarefa)
   {
       $tarefa->descompletar();

       return Redirect::back();
   }
}
