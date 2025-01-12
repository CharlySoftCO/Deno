<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['client', 'services'])->orderBy('id', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all(); // Lista de clientes
        $services = Service::all(); // Lista de servicios
        return view('admin.projects.create', compact('clients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'services' => 'required|array', // Campo requerido
            'services.*' => 'exists:services,id', // Validar que cada servicio exista
        ]);

        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'client_id' => $validatedData['client_id'],
        ]);

        // Asociar los servicios seleccionados
        $project->services()->sync($validatedData['services']);

        return redirect()->route('projects.index')->with('success', '¡El proyecto se ha creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscar el proyecto por ID
        $project = Project::with('services')->findOrFail($id);

        // Obtener todos los clientes y servicios
        $clients = Client::all();
        $services = Service::all();

        // Retornar la vista de edición con los datos necesarios
        return view('admin.projects.edit', compact('project', 'clients', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        // Buscar el proyecto por ID
        $project = Project::findOrFail($id);

        // Actualizar los datos del proyecto
        $project->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'client_id' => $validatedData['client_id'],
        ]);

        // Sincronizar los servicios seleccionados
        $project->services()->sync($validatedData['services']);

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
