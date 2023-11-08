<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Colonne 'id' (clé primaire)
            $table->unsignedBigInteger('id_sample'); // Colonne 'id_sample' (clé étrangère)
            $table->integer('nb_etoiles');
            $table->text('commentaire');
            $table->string('identifiant');
            $table->timestamps(); // Ajouter les colonnes 'created_at' et 'updated_at'
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('id_sample')->references('id')->on('samples');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
