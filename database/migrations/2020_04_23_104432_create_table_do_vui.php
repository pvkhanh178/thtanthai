<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDoVui extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('do_vui');
        Schema::create('do_vui', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->longText('noi_dung');
            $table->string('img')->nullable()->default("dovui.png");
            $table->foreignId('id_tac_gia')->references('id')->on('users')->onDelete(
                'cascade');
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
        Schema::dropIfExists('do_vui');
    }
}
