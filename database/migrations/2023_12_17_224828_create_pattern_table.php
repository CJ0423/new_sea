<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pattern_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('chose_pattern_id');
            $table->unsignedBigInteger('activity_id');

            // 為 chose_pattern_id 設置外鍵約束
            $table->foreign('chose_pattern_id')
                ->references('id')->on('chose_pattern')
                ->onDelete('cascade');

            // 為 activity_id 設置外鍵約束
            $table->foreign('activity_id')
                ->references('id')->on('activity')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::create('pattern_table', function (Blueprint $table) {
            // 移除外鍵約束
            $table->dropForeign(['chose_pattern_id']);
            $table->dropForeign(['activity_id']);
        });
    }
};
