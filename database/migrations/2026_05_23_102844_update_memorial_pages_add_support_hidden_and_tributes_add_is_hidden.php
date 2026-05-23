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
        Schema::table('memorial_pages', function (Blueprint $table) {
            $table->renameColumn('tributes_hidden', 'support_hidden');
        });

        Schema::table('tributes', function (Blueprint $table) {
            $table->boolean('is_hidden')->default(false)->after('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tributes', function (Blueprint $table) {
            $table->dropColumn('is_hidden');
        });

        Schema::table('memorial_pages', function (Blueprint $table) {
            $table->renameColumn('support_hidden', 'tributes_hidden');
        });
    }
};
