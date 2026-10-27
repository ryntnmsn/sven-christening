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
        Schema::table('guests', function (Blueprint $table) {
            $table->unsignedTinyInteger('confirmed')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('guests')->where('confirmed', 2)->update(['confirmed' => 0]);

        Schema::table('guests', function (Blueprint $table) {
            $table->boolean('confirmed')->default(false)->change();
        });
    }
};
