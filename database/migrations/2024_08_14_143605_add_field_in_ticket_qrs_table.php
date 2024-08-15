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
        Schema::table('ticket_qrs', function (Blueprint $table) {
      $table->timestamp('visited_date')->nullable()->after('price');
            // $table->timestamp('access_period')->nullable();  //8 hour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_qrs', function (Blueprint $table) {
            //
        });
    }
};
