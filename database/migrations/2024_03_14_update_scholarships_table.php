<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            // Drop existing columns if they exist
            $table->dropColumn(['name', 'cover', 'description', 'slug', 'address', 'contact']);
            
            // Add new columns
            $table->string('title')->after('id');
            $table->text('description');
            $table->json('requirements');
            $table->json('benefits');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('slots_available');
            $table->timestamp('deadline');
            $table->enum('status', ['draft', 'open', 'closed'])->default('draft');
        });
    }

    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            // Remove new columns
            $table->dropColumn([
                'title',
                'description',
                'requirements',
                'benefits',
                'course_id',
                'slots_available',
                'deadline',
                'status'
            ]);

            // Restore original columns
            $table->string('name');
            $table->string('cover');
            $table->text('description');
            $table->string('slug');
            $table->string('address');
            $table->string('contact');
        });
    }
}; 