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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->foreignId('dj_id')->constrained()->onDelete('cascade');
            $table->string('dj');
            $table->string('image');
            $table->string('video');
            $table->string('title');
            $table->date('date');
            $table->time('time');
            $table->string('description');
            $table->integer('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
