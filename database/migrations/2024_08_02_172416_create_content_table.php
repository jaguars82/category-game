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
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('main-image')->nullable();
            $table->string('main-video')->nullable();
            $table->string('main-audio')->nullable();
            $table->string('background-image')->nullable();
            $table->string('background-video')->nullable();
            $table->string('background-audio')->nullable();
            $table->text('content')->nullable();
            $table->integer('author_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
