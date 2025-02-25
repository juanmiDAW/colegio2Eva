<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notas.index', ['notas' => Nota::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notas.create', ['asignaturas' => Asignatura::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user()->id;
        $validate = $request->validate([
            'asignaturas'=>'required|string|max:255',
            'nota'=>'required|integer',
        ]);

        $validate['user_id'] = $user;

        Nota::create($validate);
        return redirect()->route('notas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
