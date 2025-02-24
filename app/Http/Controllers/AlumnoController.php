<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\returnSelf;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        
        //alumnos ordenados por id
        
        $alumnos = Alumno::orderBy('id', 'asc')->get();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required | string | max:255', 
        ]);

        Alumno::create($validate);
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', ['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $validate = $request->validate([ 
            'nombre' => 'required | string | max:255',
        ]);

        $alumno->fill($validate);
        $alumno->save();

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        if(!Gate::allows('eliminar-alumno')){
            abort(403, 'No eres el admin');
        };

        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
