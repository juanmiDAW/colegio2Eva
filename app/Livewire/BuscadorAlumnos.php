<?php

namespace App\Livewire;

use App\Models\Alumno;
use Livewire\Component;

use function Livewire\Volt\mount;

class BuscadorAlumnos extends Component
{

    public $query = '';
    public $resultados = [];

    private function cargarTodosAlumnos()
    {
        $this->resultados = Alumno::all();
    }
    public function mount()
    {
        $this->cargarTodosAlumnos();
    }

    public function updatedQuery()
    {
        if (empty($this->query)) {
        } else {

            $this->resultados = Alumno::where('nombre', 'like', '%' . $this->query . '%')->limit(10)->get();
            // dd($this->resultados);
        }
    }


    public function render()
    {
        return view('livewire.buscador-alumnos');
    }
}
