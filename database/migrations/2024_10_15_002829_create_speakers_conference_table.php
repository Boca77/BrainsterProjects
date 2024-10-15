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
        Schema::create('speakers_conferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_speaker_id')->constrained('conference_speakers')->cascadeOnDelete();
            $table->foreignId('annual_conference_id')->constrained('annual_conferences')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers_conference');
    }
};
