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
        Schema::create('activity', function (Blueprint $table) {

            // 圖片位址 圖片替代文字 圖片區域 是否為手機 活動外鍵盤->因為會有兩個一個是手機的一個是電腦的
            $table->id();
            $table->timestamps();
            $table->string("title"); //標題
            $table->string("subtitle")->nullable(); //小標題

            $table->string("button_name")->nullable(); //按鈕的字
            $table->text("button_link")->nullable(); //按鈕連結

            $table->text("img_pc_url"); //電腦圖片網址
            $table->text("img_pad_url"); //手機圖片網址
            $table->string("img_size_pc"); //直向、橫向、專門給電腦
            $table->string("img_size_pad"); //直向、橫向、專門給手機的 column-img row-img
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_img');
    }
};
