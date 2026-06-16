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
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();

            // Clés étrangères liées à tes tables existantes
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Dates clés pour le suivi des flux et retards
            $table->date('date_emprunt');
            $table->date('date_restitution_prevue');
            $table->date('date_restitution_effective')->nullable(); // Géré par Dev 1 plus tard

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
