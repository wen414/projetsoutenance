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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->string('filiere');
            $table->string('niveau');
            $table->string('diplome');
            $table->string('type_stage');
            $table->string('statut_stage');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('contact');
            $table->string('pdf_path'); // Pour stocker le chemin du fichier PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
