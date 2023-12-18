<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('chose_pattern', function (Blueprint $table) {
            // 首先移除外鍵約束
            // $table->dropForeign(['activity_id']);
            // 接著移除 'activity_id' 欄位
            $table->dropColumn('activity_id');
        });
    }

    public function down()
    {
        Schema::table('chose_pattern', function (Blueprint $table) {
            // 重新添加 'activity_id' 欄位
            $table->unsignedBigInteger('activity_id');
            // 如果需要，可以再添加外鍵約束
            // $table->foreign('activity_id')->references('id')->on('activity')->onDelete('cascade');
        });
    }
};
