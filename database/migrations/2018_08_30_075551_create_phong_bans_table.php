<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_bans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->timestamps();
        });

        Schema::create('bo_phans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('phongban_id');
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
        Schema::dropIfExists('phong_bans');
        Schema::dropIfExists('bo_phans');
    }
}
