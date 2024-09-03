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
        /** Games table */
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index('content_id');

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();
        });

        /** Categories table */
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index(['game_id', 'content_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        /** Questions table */
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->integer('weight')->comment('the value of the questions (in points)');
            $table->timestamps();

            $table->index(['category_id', 'content_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'category_id']);
            $table->dropIndex(['content_id', 'category_id']);
        });
        Schema::dropIfExists('questions');

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'game_id']);
            $table->dropIndex(['content_id', 'game_id']);
        });
        Schema::dropIfExists('categories');

        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['content_id']);
            $table->dropIndex(['content_id']);
        });
        Schema::dropIfExists('games');
    }
};
