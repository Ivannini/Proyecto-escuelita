<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Mostrar listado de alumnos.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Mostrar formulario para crear un nuevo alumno.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Guardar un nuevo alumno en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre'            => 'required|string|max:255',
            'correo'            => 'required|email|unique:alumnos,correo',
            'fecha_nacimiento'  => 'required|date',
            'ciudad'            => 'required|string|max:255'
        ]);

        // Crear alumno
        Alumno::create($request->all());

        // Redirigir
        return redirect()->route('alumnos.index')
                         ->with('success','Alumno creado exitosamente.');
    }

    /**
     * Mostrar un alumno específico.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Mostrar formulario para editar un alumno.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Actualizar un alumno existente.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre'            => 'required|string|max:255',
            'correo'            => 'required|email|unique:alumnos,correo,'.$alumno->id,
            'fecha_nacimiento'  => 'required|date',
            'ciudad'            => 'required|string|max:255'
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
                         ->with('success','Alumno actualizado exitosamente.');
    }

    /**
     * Eliminar un alumno de la base de datos.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')
                         ->with('success','Alumno eliminado exitosamente.');
    }
}
