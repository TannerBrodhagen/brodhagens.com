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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            
            $table->string('photo_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('place')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('camera_make')->nullable();
            $table->string('camera_model')->nullable();
            $table->string('camera_lens')->nullable();

            $table->json('exif')->nullable();

            $table->string('photo')->nullable();
            $table->string('photo_thumbnail')->nullable();
            $table->string('photo_original')->nullable();
            
            $table->timestamp('date_taken')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
