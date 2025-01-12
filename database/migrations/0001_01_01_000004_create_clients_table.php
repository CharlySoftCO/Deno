<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('document_type', 3); // CC, NIT, CE, etc.
            $table->string('document_number', 20)->unique(); // Número del documento
            $table->string('name'); // Nombre completo o razón social
            $table->string('email')->nullable(); // Email del cliente
            $table->string('phone', 15)->nullable(); // Teléfono de contacto
            $table->string('mobile', 15)->nullable(); // Teléfono móvil
            $table->string('address')->nullable(); // Dirección
            $table->string('city')->nullable(); // Ciudad
            $table->string('department')->nullable(); // Departamento
            $table->string('country')->default('Colombia'); // País, con valor por defecto
            $table->string('company_name')->nullable(); // Nombre de la empresa, si aplica
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
}

