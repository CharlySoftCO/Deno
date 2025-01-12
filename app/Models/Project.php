<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'name', 'description'];

    // Relación con usuarios
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    // Relación con clientes
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'project_service');
    }
}
