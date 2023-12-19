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
        Schema::create('banner_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("img_pc_url"); //電腦圖片網址
            $table->string("img_pad_url"); //手機圖片網址
            $table->string("title"); //主標題
            $table->string("subtitle")->nullable(); //小標題
            $table->string("button_name")->nullable(); //按鈕的字
            $table->string("button_link")->nullable(); //按鈕連結

            $table->timestamp('start_time')->nullable(); // 如果活動的開始時間是可選的
            $table->timestamp('end_time')->nullable();
            $table->integer('Rank'); //第幾格
            // 如果活動的結束時間是可選的
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
