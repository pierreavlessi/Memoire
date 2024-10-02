<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();  // ID auto-incrémenté
            $table->string('libelle_activite');
            $table->string('description');
            $table->integer('id_type');
            $table->string('statut');
            $table->timestamps();  // Pour created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('activites');
    }
}
