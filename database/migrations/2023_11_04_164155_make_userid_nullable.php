<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUseridNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur')->nullable()->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur')->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur')->nullable()->change();
        });
    }
}
