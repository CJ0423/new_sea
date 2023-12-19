<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeMenuNameAndMenuLinkNullable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('childmenu', function (Blueprint $table) {
            $table->string('menu_name')->nullable()->change();
            $table->string('menu_link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('childmenu', function (Blueprint $table) {
            $table->string('menu_name')->nullable(false)->change();
            $table->string('menu_link')->nullable(false)->change();
        });
    }
}
