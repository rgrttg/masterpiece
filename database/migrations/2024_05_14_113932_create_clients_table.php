<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            // Vorname
            $table->string('firstname');
            // Nachname
            $table->string('lastname');
            // E-Mail
            $table->string('email');
            // Telefon
            $table->string('phone');
            // Thema
            $table->string('subject');
            // Strasse Nr
            $table->string('street');
            // PLZ Ort
            $table->string('city');
            // Geburtsdatum
            $table->date('birthdate');
            $table->timestamps();
            
            // Optional für spätere Versionen
            // Partner
            // -Namen
            // -Geburtsdatum
            // WieLange
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
