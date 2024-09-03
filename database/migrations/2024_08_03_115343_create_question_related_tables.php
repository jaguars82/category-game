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
        /** Answears table */
        Schema::create('answears', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index(['content_id', 'question_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        
        /** Hints table */
        Schema::create('hints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index(['content_id', 'question_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        /** Success screens table */
        Schema::create('success_screans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index(['content_id', 'question_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        /** Fail screens table */
        Schema::create('fail_screans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->timestamps();

            $table->index(['content_id', 'question_id']);

            $table->foreign('content_id')
                ->references('id')
                ->on('content')
                ->onUpdate('cascade')
                ->nullOnDelete();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fail_screans', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'question_id']);
            $table->dropIndex(['content_id', 'question_id']);
        });
        Schema::dropIfExists('fail_screans');

        Schema::table('success_screans', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'question_id']);
            $table->dropIndex(['content_id', 'question_id']);
        });
        Schema::dropIfExists('success_screans');

        Schema::table('hints', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'question_id']);
            $table->dropIndex(['content_id', 'question_id']);
        });
        Schema::dropIfExists('hints');

        Schema::table('answears', function (Blueprint $table) {
            $table->dropForeign(['content_id', 'question_id']);
            $table->dropIndex(['content_id', 'question_id']);
        });
        Schema::dropIfExists('answears');
    }
};
