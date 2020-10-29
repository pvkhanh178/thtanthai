<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMonHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mon_hoc');
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lop')->references('id')->on('lop_hoc')->onDelete(
                'cascade');
            $table->string('ten_mon');
            $table->string('ghi_chu')->nullable();
            $table->string('img')->nullable()->default("monhoc.jpg");
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
        Schema::dropIfExists('mon_hoc');
    }
}
