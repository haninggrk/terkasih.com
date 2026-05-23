<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tributes', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(9999)->change();
        });

        DB::table('tributes')->where('sort_order', 0)->update(['sort_order' => 9999]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tributes', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->change();
        });
    }
};
