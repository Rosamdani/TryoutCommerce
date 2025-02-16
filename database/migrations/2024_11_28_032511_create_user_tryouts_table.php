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
        Schema::create('user_tryouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tryout_id', 36);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreign('tryout_id')->references('id')->on('tryouts')->onDelete('cascade');
            $table->integer('nilai')->nullable();
            $table->integer('rank')->nullable();
            $table->enum('status', ['not_started', 'started', 'paused', 'finished'])->nullable();
            $table->integer('waktu')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tryouts');
    }
};
