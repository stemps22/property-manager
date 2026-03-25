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

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('owner_id')
            ->nullable() // Allows for existing users or independent admins
            ->constrained('owners')
            ->onDelete('cascade');
          $table->string('role')->default('staff')->after('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
        $table->dropColumn('owner_id');
        });
    }
};
