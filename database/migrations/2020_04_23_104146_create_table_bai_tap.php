<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBaiTap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_cau_hoi', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai')->unique();
            $table->string('mo_ta');
            $table->timestamps();
        });
        Schema::create('bai_tap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bai_hoc')->references('id')->on('bai_hoc')->onDelete(
                'cascade');
            $table->foreignId('id_loai_cau_hoi')->references('id')->on('loai_cau_hoi')->onDelete(
                'cascade');
            $table->longText('cau_hoi');
            $table->longText('noi_dung');
            $table->string('audio')->nullable();
            $table->longText('dap_an_1')->nullable();
            $table->longText('dap_an_2')->nullable();
            $table->longText('dap_an_3')->nullable();
            $table->longText('dap_an_4')->nullable();
            $table->longText('dap_an_dung')->nullable();
            $table->longText('dap_an_dung1')->nullable();
            $table->longText('loi_giai')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('loai_cau_hoi');
        Schema::dropIfExists('bai_tap');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
