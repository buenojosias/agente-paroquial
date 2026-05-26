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
        Schema::create('parish_user', function (Blueprint $table) {
            $table->foreignId('parish_id')->cascadeOnDelete();
            $table->foreignId('user_id')->cascadeOnDelete();
            $table->string('role', 30);
            $table->unique(['parish_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parish_user');
    }
};
