<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_sub_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('position');
            $table->string('name')->nullable();
            $table->boolean('attending')->default(false);
            $table->timestamps();
            $table->unique(['guest_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_sub_guests');
    }
};
