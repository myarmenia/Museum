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
        Schema::create('museum_translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->index();
            $table->foreignId('museum_id')->on('museums')->onDelete('cascade');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('working_days');
            $table->string('director_name');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('museum_translations');
    }
};
