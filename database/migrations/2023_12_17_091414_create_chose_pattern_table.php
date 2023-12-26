<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chose_pattern', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('start_time')->nullable(); // 如果活動的開始時間是可選的
            $table->timestamp('end_time')->nullable();   // 如果活動的結束時間是可選的
            $table->integer('how_many_space'); //共有幾格
            $table->string("whitch_pattern"); //哪一個版型
            $table->integer('number_of_pattern'); //第幾格
            // //外鍵對應對方activity的id與主標題//
            // $table->unsignedBigInteger('activity_id');

            // $table->foreign('activity_id')->references('id')->on('activity')->onDelete('cascade'); //外鍵中的活動的id可以直接用這個把圖片給抓取
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chose_pattern');
    }
};
