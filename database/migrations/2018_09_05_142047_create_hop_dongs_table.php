<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopDongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hop_dongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhansu_id');
            $table->string('ma_hd')->unique();
            $table->string('ten');
            $table->integer('loaihopdong_id')->default(0);
            $table->datetime('ngay_ky');
            $table->datetime('ngay_co_hieu_luc');
            $table->datetime('ngay_het_hieu_luc');
            $table->string('luong_can_ban');
            $table->string('luong_tro_cap');
            $table->string('luong_hieu_qua');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();
        });

        Schema::create('loai_hop_dongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
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
        Schema::dropIfExists('hop_dongs');
        Schema::dropIfExists('loai_hop_dongs');
    }
}
