<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->integer('duree'); // en minutes (1h = 60min)
            $table->integer('nb_places_max');
            $table->float('cout');
            $table->unsignedBigInteger('intervenant_id');
            $table->unsignedBigInteger('domaine_id');
            $table->foreign('intervenant_id')->references('id')->on('intervenants')->onDelete('cascade');;
            $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');;
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
        Schema::dropIfExists('formations');
    }
}
