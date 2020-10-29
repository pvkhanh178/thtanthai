<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBaiTapLopQuanLy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bai_hoc_lop_quan_ly');
        Schema::create('bai_hoc_lop_quan_ly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lop_quan_ly')->references('id')->on('lop_quan_ly')->onDelete(
                'cascade');
            $table->string('ten_bai_hoc');
            $table->longText('noi_dung');
            $table->integer('luot_xem')->default('0');
            $table->timestamps();
        });
        Schema::dropIfExists('bai_tap_lop_quan_ly');
        Schema::create('bai_tap_lop_quan_ly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bai_hoc_lop_quan_ly')->references('id')->on('bai_hoc_lop_quan_ly')->onDelete(
                'cascade');
            $table->foreignId('id_loai_cau_hoi')->references('id')->on('loai_cau_hoi')->onDelete(
                'cascade');
            $table->longText('cau_hoi');
            $table->longText('noi_dung');
            $table->longText('dap_an_1')->nullable();
            $table->longText('dap_an_2')->nullable();
            $table->longText('dap_an_3')->nullable();
            $table->longText('dap_an_4')->nullable();
            $table->longText('dap_an_dung')->nullable();
            $table->longText('dap_an_dung1')->nullable();
            $table->longText('loi_giai')->nullable();
            $table->timestamps();
        });
        Schema::dropIfExists('chi_tiet_lam_bai_tap_lop_quan_ly');
        Schema::create('chi_tiet_lam_bai_tap_lop_quan_ly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bai_tap_lop_quan_ly')->references('id')->on('bai_tap_lop_quan_ly')->onDelete(
                'cascade');
            $table->foreignId('id_hoc_sinh')->references('id')->on('users')->onDelete(
                'cascade');
            $table->integer('so_lan_lam_bai')->default('0');
            $table->integer('tra_loi_dung')->default('0');
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
        Schema::dropIfExists('bai_hoc_lop_quan_ly');
        Schema::dropIfExists('bai_tap_lop_quan_ly');
        Schema::dropIfExists('chi_tiet_lam_bai_tap_lop_quan_ly');
    }
}
