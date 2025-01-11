<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|unique:companies,nit',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nit' => 'required|numeric|unique:companies,nit,' . $id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar la empresa por su ID
        $company = Company::find($id);

        // Verificar si la empresa existe
        if (!$company) {
            return redirect()->route('companies.index')
                ->with('error', 'La empresa no fue encontrada.');
        }

        try {
            // Eliminar la empresa
            $company->delete();

            // Redireccionar con mensaje de éxito
            return redirect()->route('companies.index')
                ->with('success', 'La empresa fue eliminada exitosamente.');
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error si ocurre algún problema
            return redirect()->route('companies.index')
                ->with('error', 'Ocurrió un problema al intentar eliminar la empresa.');
        }
    }
}
