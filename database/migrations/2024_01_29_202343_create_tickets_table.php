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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('userId');
            $table->string('dj');
            $table->string('image');
            $table->string('title');
            $table->date('date');
            $table->time('time');
            $table->integer('price');
            $table->string('paymentMethod');
            $table->string('paymentStatus');
            $table->boolean('redeemed')->default(false); // Boolean flag to indicate if the ticket is redeemed
            $table->timestamp('redeemed_at')->nullable(); // Timestamp to store when the ticket was redeemed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
