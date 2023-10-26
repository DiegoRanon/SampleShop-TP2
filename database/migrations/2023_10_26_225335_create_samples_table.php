<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id(); // Colonne 'id' (clé primaire)
            $table->unsignedBigInteger('id_utilisateur'); // Colonne 'id_utilisateur' (clé étrangère)
            $table->string('titre');
            $table->string('compositeur');
            $table->text('description');
            $table->string('category');
            $table->string('cle_musical');
            $table->integer('bpm');
            $table->string('genre');
            $table->timestamp('date');
            $table->timestamps(); // Ajouter les colonnes 'created_at' et 'updated_at'
        });

        // Ajouter une clé étrangère pour 'id_utilisateur' si nécessaire
        Schema::table('samples', function (Blueprint $table) {
            $table->foreign('id_utilisateur')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
