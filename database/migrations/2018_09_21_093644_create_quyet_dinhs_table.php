<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyetDinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyet_dinhs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhansu_id');
            $table->string('ma_qd')->unique();
            $table->integer('loaiquyetdinh_id')->default(0);
            $table->datetime('ngay_ky');
            $table->text('can_cu')->nullable();
            $table->text('noi_nhan')->nullable();
            $table->string('tong_thu_nhap_cu')->nullable();
            $table->string('tong_thu_nhap_moi')->nullable();
            $table->string('luong_co_ban_moi')->nullable();
            $table->string('luong_tro_cap_moi')->nullable();
            $table->string('luong_hieu_qua_moi')->nullable();
            $table->string('ly_do')->nullable();
            $table->string('chuc_vu_cu')->nullable();
            $table->string('chuc_vu_moi')->nullable();
            $table->integer('bo_phan_cu')->nullable();
            $table->integer('bo_phan_moi')->nullable();
            $table->string('chuc_vu_hien_tai')->nullable();
            $table->boolean('trang_thai')->default(0);// đã ký/chưa ký.
            $table->timestamps();
        });

        Schema::create('loai_quyet_dinhs', function (Blueprint $table) {
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
        Schema::dropIfExists('quyet_dinhs');
        Schema::dropIfExists('loai_quyet_dinhs');
    }
}
