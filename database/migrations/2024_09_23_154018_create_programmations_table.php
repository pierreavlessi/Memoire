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
        Schema::create('programmations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_salle');
            $table->unsignedBigInteger('id_util');
            $table->unsignedBigInteger('id_activite');
            $table->date('date');
            $table->time('heure_deb');
            $table->time('heure_fin');
            $table->string('statut');
            $table->text('description')->nullable();

            // Foreign keys
            $table->foreign('id_salle')->references('id_salle')->on('salle');
            $table->foreign('id_util')->references('id_util')->on('utilisateur');
            $table->foreign('id_activite')->references('id_activite')->on('activite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmations');
    }
};
