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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_group_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('type_link')->nullable()->default('page');
            $table->string('code')->unique();
            $table->string('title');
            $table->string('icon',30)->nullable();
            $table->string('target',30)->nullable()->default('_self');
            $table->unsignedBigInteger('sort_order')->nullable();
            
            $table->foreign('menu_group_id')->references('id')->on('menu_groups')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
