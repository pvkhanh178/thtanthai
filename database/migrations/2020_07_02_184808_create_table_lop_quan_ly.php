<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLopQuanLy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lop_quan_ly');
        Schema::create('lop_quan_ly', function (Blueprint $table) {
            $table->id();
            $table->string('ten_lop');
            $table->foreignId('id_giao_vien')->references('id')->on('users')->onDelete(
                'cascade');
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
        Schema::dropIfExists('lop_quan_ly');
    }
}
