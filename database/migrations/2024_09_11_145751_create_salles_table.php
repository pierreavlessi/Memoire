
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
            $table->id();
            $table->string('libelle');
            $table->integer('capacite');
            $table->string('equipement')->nullable();
            $table->boolean('disponibilite');
            $table->string('batiment');
            $table->string('responsable');
            $table->unsignedBigInteger('type_salle_id'); // la colonne qui va contenir la clé étrangère
            $table->timestamps();

            // Définir la clé étrangère qui fait référence à une table "types_salles"
            $table->foreign('type_salle_id')->references('id')->on('types_salles')->onUpdate('cascade')
            ->onDelete('cascade');
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
