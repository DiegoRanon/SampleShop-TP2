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
            $table->unsignedBigInteger('id_utilisateur'); 
            $table->string('titre');
            $table->string('compositeur');
            $table->text('description');
            $table->string('category');
            $table->string('cle_musical');
            $table->integer('bpm');
            $table->string('genre');
            $table->string('photo');
            $table->timestamp('date');
            $table->timestamps(); 
        });

        
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
