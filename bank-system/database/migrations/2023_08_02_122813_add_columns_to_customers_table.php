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
        Schema::table('customers', function (Blueprint $table) {
        $table->string('account_number')->nullable();
        $table->string('contact_person_name')->nullable();
        $table->string('contact_person_phone')->nullable();
        $table->string('business_phone')->nullable();
        $table->string('business_email')->nullable();
        $table->string('pin')->nullable();
        $table->double('available_balance')->default(0);
        $table->double('actual_balance')->default(0);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
