<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel modules: modul roadmap belajar jaringan komputer.
     * Setiap modul berisi kumpulan lesson yang berurutan.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('order_number')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            // Index untuk query yang sering dipakai
            $table->index('order_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
