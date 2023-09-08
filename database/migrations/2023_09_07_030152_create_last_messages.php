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
        Schema::create('last_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->unsigned()->references('id')->on('conversations')->cascadeOnDelete();
            $table->text('message');
            $table->foreignId('sender_id')->unsigned()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_messages');
    }
};
