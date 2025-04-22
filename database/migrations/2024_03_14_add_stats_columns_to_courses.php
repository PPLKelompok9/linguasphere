<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('impressions')->default(0);
            $table->integer('total_sales')->default(0);
            $table->decimal('total_revenue', 10, 2)->default(0);
            $table->integer('total_students')->default(0);
            $table->string('icon')->nullable();
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'impressions',
                'total_sales',
                'total_revenue',
                'total_students',
                'icon'
            ]);
        });
    }
}; 