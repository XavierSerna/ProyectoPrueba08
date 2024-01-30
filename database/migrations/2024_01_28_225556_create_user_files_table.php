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
        Schema::create('user_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('file_name');
            $table->longText('file_path');
            $table->unsignedBigInteger('size')->nullable(); // Tamaño archivo
            $table->string('type')->nullable(); // Tipo file or folder
            $table->integer('file_count')->nullable(); // Count the files if folder
            $table->boolean('is_public')->default(false);
            $table->json('allowed_user_ids')->nullable();
            $table->timestamps();
            $table->json('categories')->nullable();
            $table->json('upload')->nullable();
            $table->longText('description')->nullable();
            $table->string('public_key', 255)->nullable();
            $table->json('tags')->nullable();
            $table->boolean('fav')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_files');
    }
};
