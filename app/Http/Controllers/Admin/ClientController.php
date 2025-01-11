<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'document_type' => 'required|string|max:3', // CC, NIT, CE, etc.
            'document_number' => 'required|string|max:20|unique:clients,document_number',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'mobile' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);
    
        // Crear el cliente
        $client = Client::create($validatedData);
    
        // Redirigir al listado de clientes con mensaje de éxito
        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'document_type' => 'required|string|max:3',
            'document_number' => 'required|string|max:20|unique:clients,document_number,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'mobile' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);
    
        $client = Client::findOrFail($id);
        $client->update($request->all());
    
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado con éxito.');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
    
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Error al eliminar el cliente.');
        }
    }    
}
