<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $projects = Project::all();
        return view('admin.users.create', compact('companies', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|in:CC,CE',
            'document_number' => 'required|numeric|unique:users,document_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'company_id' => 'required|exists:companies,id',
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id',
            'phone' => 'required|digits_between:7,15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar la foto de perfil si fue cargada
        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photo', 'public');
        }

        // Crear el usuario
        $user = User::create([
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'is_active' => $request->is_active ?? true,
            'profile_photo' => $profilePhotoPath,
        ]);

        // Asociar al usuario con los proyectos seleccionados
        $user->projects()->sync($request->project_ids);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
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
        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Obtener todas las compañías y proyectos para los select
        $companies = Company::all();
        $projects = Project::all();

        // Retornar la vista de edición con los datos necesarios
        return view('admin.users.edit', compact('user', 'companies', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados
        $request->validate([
            'document_type' => 'required|in:CC,CE',
            'document_number' => 'required|numeric|unique:users,document_number,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'company_id' => 'required|exists:companies,id',
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id',
            'phone' => 'required|digits_between:7,15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Manejar la foto de perfil si fue cargada
        if ($request->hasFile('profile_photo')) {
            // Eliminar la foto anterior si existe
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Subir la nueva foto
            $user->profile_photo = $request->file('profile_photo')->store('profile_photo', 'public');
        }

        // Actualizar los datos del usuario
        $user->update([
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'is_active' => $request->is_active ?? true,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Sincronizar los proyectos seleccionados
        $user->projects()->sync($request->project_ids);

        // Redirigir con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el usuario por ID
        $user = User::findOrFail($id);

        // Verificar si el usuario tiene una imagen de perfil
        if ($user->profile_photo) {
            // Eliminar la imagen de perfil del almacenamiento
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Desasociar proyectos relacionados
        $user->projects()->detach();

        // Eliminar el usuario
        $user->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
