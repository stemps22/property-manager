<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Making the type column nullable so it doesn't crash the insert
            if (Schema::hasColumn('subscriptions', 'type')) {
                $table->string('type')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('type')->nullable(false)->change();
        });
    }
};