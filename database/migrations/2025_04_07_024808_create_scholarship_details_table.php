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
        Schema::create('scholarship_details', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_scholarship')->constrained('scholarships')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_details');
    }
};
