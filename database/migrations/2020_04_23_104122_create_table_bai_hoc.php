<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBaiHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muc_mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mon')->references('id')->on('mon_hoc')->onDelete(
                'cascade');
            $table->string('ten_muc');
            $table->timestamps();
        });
        Schema::create('bai_hoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_muc')->references('id')->on('muc_mon_hoc')->onDelete(
                'cascade');
            $table->string('ten_bai_hoc');
            $table->longText('noi_dung');
            $table->integer('luot_xem')->default('0');
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
        Schema::dropIfExists('muc_mon_hoc');
        Schema::dropIfExists('bai_hoc');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
