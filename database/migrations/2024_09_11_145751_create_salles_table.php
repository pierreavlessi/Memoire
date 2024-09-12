
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->id('id_salle');
            $table->string('libelle_salle');
            $table->string('capacite');
            $table->string('equipement');
            $table->boolean('disponibilite');
            $table->string('type_salle');
            $table->string('batiment');
            $table->string('responsable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salles');
    }
}
