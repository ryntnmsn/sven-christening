<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->string('code', 3)->nullable();
        });

        DB::table('guests')->orderBy('id')->chunkById(100, function ($guests): void {
            foreach ($guests as $guest) {
                do {
                    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $code = '';
                    for ($i = 0; $i < 3; $i++) {
                        $code .= $alphabet[random_int(0, strlen($alphabet) - 1)];
                    }
                } while (DB::table('guests')->where('code', $code)->exists());

                DB::table('guests')->where('id', $guest->id)->update(['code' => $code]);
            }
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->string('code', 3)->nullable(false)->change();
            $table->unique('code');
        });
    }

    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropUnique('guests_code_unique');
            $table->dropColumn('code');
        });
    }
};
