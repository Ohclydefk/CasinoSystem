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
        Schema::table('members', function (Blueprint $table) {
            // Add soft deletes
            $table->softDeletes()->after('updated_at');

            // Add status column
            $table->enum('status', ['archived', 'active', 'disabled', 'hold'])
                ->default('active')
                ->after('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['deleted_at', 'status']);
        });
    }
};
