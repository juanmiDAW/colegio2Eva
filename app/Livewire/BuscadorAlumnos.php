<?php

namespace App\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class BuscadorAlumnos extends Component
{

    public $query = '';
    public $resultados = [];

    public function updatedQuery()
    {
        $this->resultados = Alumno::where('nombre', 'like', '%' . $this->query . '%')->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.buscador-alumnos');
    }
}
