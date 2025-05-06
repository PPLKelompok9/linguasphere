<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('requirements');
            $table->json('benefits');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('slots_available');
            $table->timestamp('deadline');
            $table->enum('status', ['draft', 'open', 'closed'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}; 