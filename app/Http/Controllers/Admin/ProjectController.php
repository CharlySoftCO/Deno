<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Crear un nuevo proyecto con los datos validados
        Project::create([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'] ?? null, // Si no hay descripción, asignar null
        ]);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscar el proyecto por ID
        $project = Project::findOrFail($id);

        // Retornar la vista de edición con los datos del proyecto
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Buscar el proyecto por ID
        $project = Project::findOrFail($id);

        // Actualizar los datos del proyecto
        $project->update([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'] ?? null,
        ]);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el proyecto por ID y eliminarlo
        $project = Project::findOrFail($id);
        $project->delete();

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha eliminado correctamente!');
    }
}
