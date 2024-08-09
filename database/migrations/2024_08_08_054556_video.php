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
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('url');
            $table->boolean('is_pitch')->default(true);
            $table->integer('likes');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('video_challenge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_id')->constrained('video')->onDelete('cascade');
            $table->foreignId('challenge_id')->constrained('challenge')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('video_challenge_rate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_challenge_id')->constrained('video_challenge')->onDelete('cascade');
            $table->foreignId('challenge_judge_id')->constrained('challenge_judge')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('video_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('video_id')->constrained('video')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
        Schema::dropIfExists('video_challenge');
        Schema::dropIfExists('video_challenge_rate');
        Schema::dropIfExists('video_likes');
    }
};
