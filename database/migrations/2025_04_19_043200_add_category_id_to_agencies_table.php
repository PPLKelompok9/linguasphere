<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('agencies', function (Blueprint $table) {
      $table->foreignId('category_id')->nullable()->contrained('categories')->onDelete('cascade')->after('description');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('agencies', function (Blueprint $table) {
      $foreignKeys = DB::select("
                SELECT CONSTRAINT_NAME
                FROM information_schema.KEY_COLUMN_USAGE
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'agencies'
                AND COLUMN_NAME = 'category_id'
                AND REFERENCED_TABLE_NAME = 'categories'
            ");

      if (!empty($foreignKeys)) {
        $table->dropForeign('agencies_category_id_foreign');
      }

      $table->dropColumn('category_id');
    });
  }
};
