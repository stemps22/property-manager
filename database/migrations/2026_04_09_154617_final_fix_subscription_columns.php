<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // 1. Set a default value for 'name' so MySQL doesn't crash if it's missing
            $table->string('name')->default('default')->change();

            // 2. Ensure 'type' is also nullable just in case
            if (Schema::hasColumn('subscriptions', 'type')) {
                $table->string('type')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('name')->nullable(false)->default(null)->change();
        });
    }
};