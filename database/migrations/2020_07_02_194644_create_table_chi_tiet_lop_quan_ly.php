<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChiTietLopQuanLy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('chi_tiet_lop_quan_ly');
        Schema::create('chi_tiet_lop_quan_ly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hoc_sinh')->references('id')->on('users')->onDelete(
                'cascade');
            $table->foreignId('id_lop_quan_ly')->references('id')->on('lop_quan_ly')->onDelete(
                'cascade');
            $table->integer('diem')->default('0');
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
        Schema::dropIfExists('chi_tiet_lop_quan_ly');
    }
}
