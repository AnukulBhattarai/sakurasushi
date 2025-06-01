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
        Schema::table('programs', function (Blueprint $table) {
            $table->string('duration')->nullable()->change();
            $table->string('instructor')->nullable()->change();
            $table->integer('price')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('duration')->nullable(false)->change();
            $table->string('instructor')->nullable(false)->change();
            $table->integer('price')->default(0)->change();
        });
    }
};
