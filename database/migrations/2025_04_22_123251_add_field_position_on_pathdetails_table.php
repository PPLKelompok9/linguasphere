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
        Schema::table('path_details', function (Blueprint $table) {
            $table->unsignedInteger('position')->after('id_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('path_details', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
