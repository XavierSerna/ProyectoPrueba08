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

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('user_files')->onDelete('cascade'); //on delete cascade will delete the child files if the parent is deleted

            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('file_name');
            $table->longText('file_path');

            $table->unsignedBigInteger('size')->nullable();
            $table->string('type')->nullable();
            $table->integer('file_count')->nullable();

            $table->boolean('is_public')->default(false);
            $table->json('allowed_user_ids')->nullable();
            $table->timestamps();
            $table->json('categories')->nullable();
            $table->json('upload')->nullable();
            $table->longText('description')->nullable();
            $table->string('public_key', 255)->nullable();
            $table->json('tags')->nullable();
            $table->boolean('fav')->default(false);

            $table->index('parent_id');
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
