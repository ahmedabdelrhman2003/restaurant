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
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('message');
            $table->string('company');
            $table->string('email');
            $table->string('phone');
            $table->string('reply')->nullable();
            $table->enum('status', ['pending', 'replied'])->default('pending');
            $table->string('services');
            $table->string('location');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry');
    }
};