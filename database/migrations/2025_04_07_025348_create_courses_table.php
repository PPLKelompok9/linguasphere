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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->string("cover");
            $table->string("slug");
            $table->float("price");
            $table->float("diskon_price");
            $table->float("level");
            $table->integer('impressions')->default(0);
            $table->integer('total_sales')->default(0);
            $table->decimal('total_revenue', 10, 2)->default(0);
            $table->integer('total_students')->default(0);
            $table->string('icon')->nullable();
            $table->foreignId("id_agency")->constrained("agencies")->onDelete("cascade");
            $table->foreignId("id_category")->contrained("categories")->onDelete("cascade")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
