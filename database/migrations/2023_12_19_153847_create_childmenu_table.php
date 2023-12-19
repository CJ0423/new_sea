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
        Schema::create('childmenu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('menu_name');
            $table->string('menu_link');
            $table->unsignedBigInteger('menu_id');

            // 為 chose_pattern_id 設置外鍵約束
            $table->foreign('menu_id')
                ->references('id')->on('menu')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childmenu');
    }
};
