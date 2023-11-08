<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePhotoColumnInYourTable extends Migration
{
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            // Change the data type of the 'photo' column
            $table->string('photo', 255)->collation('utf8mb4_unicode_ci')->change();
        });
    }

    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {

        });
    }
}

