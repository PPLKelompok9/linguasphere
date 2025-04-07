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
        Schema::create('sertifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover')->nullable;
            $table->text('description');
            $table->string('slug')->unique();
            $table->float('price');
            $table->string('level');
            $table->foreignId('id_agency')->constrained('agencies')->onDelete('cascade');
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifications');
    }
};
