<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        try {
            // Crear un nuevo servicio
            Service::create($validatedData);

            // Redirigir al listado de servicios con un mensaje de éxito
            return redirect()->route('services.index')
                ->with('success', '¡Servicio creado exitosamente!');
        } catch (\Exception $e) {
            // Redirigir al formulario de creación con un mensaje de error
            return redirect()->back()
                ->withErrors(['error' => 'Ocurrió un error al guardar el servicio.'])
                ->withInput();
        }
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
        // Buscar el servicio por ID
        $service = Service::findOrFail($id);

        // Retornar la vista de edición con los datos del servicio
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Buscar el servicio por ID
        $service = Service::findOrFail($id);

        // Actualizar los datos del servicio
        $service->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('services.index')->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el servicio por ID
        $service = Service::findOrFail($id);
    
        // Eliminar el servicio
        $service->delete();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('services.index')->with('success', 'Servicio eliminado correctamente.');
    }    
}
