<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('photo_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('photo_tag');
    }
};
