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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('branch');
            $table->string('icon')->nullable();
            $table->string('bg_image')->nullable();
            $table->json('card_id');
            $table->json('category_id');
            $table->string('number')->nullable();;
            $table->json('percentage')->nullable();
            $table->json('active')->nullable();
            $table->time('monday_open');
            $table->time('monday_close');
            $table->time('tuesday_open');
            $table->time('tuesday_close');
            $table->time('wednesday_open');
            $table->time('wednesday_close');
            $table->time('thursday_open');
            $table->time('thursday_close');
            $table->time('friday_open');
            $table->time('friday_close');
            $table->time('saturday_open');
            $table->time('saturday_close');
            $table->time('sunday_open');
            $table->time('sunday_close');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
