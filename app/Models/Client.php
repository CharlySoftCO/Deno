<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'email',
        'phone',
        'mobile',
        'address',
        'city',
        'department',
        'country',
        'company_name',
    ];

    // Relación con proyectos
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Si decides agregar verificación de email en el futuro
    ];
}
