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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('id_no')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('alt_name')->nullable()->comment('Alternative name for social media');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('email')->unique();
            $table->string('mobile_no');
            $table->boolean('source_of_fund_self')->default(false);
            $table->boolean('source_of_fund_employed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
