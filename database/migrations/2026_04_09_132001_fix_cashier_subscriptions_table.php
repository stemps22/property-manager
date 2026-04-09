<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // 1. Drop the foreign key constraint first
            // Passing an array ['business_id'] tells Laravel to find the index automatically
            $table->dropForeign(['business_id']);

            // 2. Now it's safe to drop the column
            $table->dropColumn('business_id');

            // 3. Add the 'name' column if it's still missing
            if (!Schema::hasColumn('subscriptions', 'name')) {
                $table->string('name')->after('id');
            }

            // 4. Ensure we have the polymorphic columns
            // Since you said Heidi was caching, check if these exist first
            if (!Schema::hasColumn('subscriptions', 'billable_id')) {
                $table->morphs('billable');
            }
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses');
            $table->dropMorphs('billable');
            $table->dropColumn('name');
        });
    }
};