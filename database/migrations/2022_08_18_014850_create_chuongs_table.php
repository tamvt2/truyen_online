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
        Schema::create('chuongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truyen_id')->references('id')->on('truyens')->onDelete('cascade');
            $table->string('chuong_so');
            $table->string('ten_chuong');
            $table->longText('noi_dung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuongs');
    }
};
