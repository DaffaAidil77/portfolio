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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('intro')->nullable();          // teks di bawah judul About
            $table->string('headline')->nullable();       // Photographer, Student & Organizer.
            $table->text('bio')->nullable();              // kalimat italic
            $table->string('campus')->nullable();
            $table->string('study_program')->nullable();
            $table->string('organization')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
