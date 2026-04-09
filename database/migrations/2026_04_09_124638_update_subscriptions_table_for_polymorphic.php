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
        Schema::table('subscriptions', function (Blueprint $table) {
            // Remove the old hardcoded user_id
            $table->dropColumn('user_id');

            // Add the new polymorphic columns
            $table->morphs('billable'); // This creates billable_id and billable_type
            
            // Helpful: add an index for performance
            $table->index(['billable_id', 'billable_type']);
        });
        
        // We also need to do this for the subscription_items table
        Schema::table('subscription_items', function (Blueprint $table) {
             // In some versions this might not be needed, but check yours.
             // Usually, only the main subscriptions table needs the billable link.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropMorphs('billable');
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }
};
