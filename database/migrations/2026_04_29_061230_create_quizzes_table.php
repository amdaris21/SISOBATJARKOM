<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel quizzes: metadata quiz ZEP.
     * Laravel hanya menyimpan info quiz, soal ada di platform ZEP.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('zep_link')->nullable();
            $table->text('instruction')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            $table->index('module_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
