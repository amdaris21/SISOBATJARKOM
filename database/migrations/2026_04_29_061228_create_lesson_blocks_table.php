<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel lesson_blocks: konten interaktif di dalam lesson.
     * Setiap block memiliki tipe (text, image, video, step, code, dll).
     */
    public function up(): void
    {
        Schema::create('lesson_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->cascadeOnDelete();
            $table->string('type', 20); // text, image, video, step, code, accordion, mini_quiz, link, embed
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('media_url')->nullable();
            $table->string('embed_url')->nullable();
            $table->text('command')->nullable();
            $table->json('options')->nullable();       // Untuk mini_quiz: pilihan jawaban
            $table->string('correct_answer')->nullable(); // Untuk mini_quiz: jawaban benar
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();

            $table->index('lesson_id');
            $table->index('order_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_blocks');
    }
};
