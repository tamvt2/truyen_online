<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('the_loai_id')->references('id')->on('the_loais')->onDelete('cascade');
            $table->string('ten_truyen');
            $table->string('thumb');
            $table->string('tac_gia');
            $table->text('mota_ngan');
            $table->date('ngay_dang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyens');
    }
};
