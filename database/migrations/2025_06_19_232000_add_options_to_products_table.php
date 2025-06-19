<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('configurations')->nullable();
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->json('storages')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['configurations', 'colors', 'sizes', 'storages']);
        });
    }
};
