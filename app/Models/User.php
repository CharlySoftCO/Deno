<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'document_type',
        'document_number',
        'phone',
        'address',
        'city',
        'position',
        'department',
        'salary',
        'hiring_company',
        'contract_type',
        'project_name',
        'start_date',
        'end_date',
        'birth_date',
        'gender',
        'marital_status',
        'profile_photo',
        'is_active',
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser casteados a tipos específicos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'start_date' => 'date',
            'end_date' => 'date',
            'birth_date' => 'date',
            'salary' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }
}
