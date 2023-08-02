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
            $table->string('account_number')->nullable(false)->change();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_email')->nullable(false)->change();
            $table->string('pin')->nullable(false)->change();
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
            $table->string('account_number')->nullable()->change();
            $table->dropColumn('contact_person_name');
            $table->dropColumn('contact_person_phone');
            $table->dropColumn('business_phone');
            $table->string('business_email')->nullable()->change();
            $table->string('pin')->nullable()->change();
            $table->dropColumn('available_balance');
            $table->dropColumn('actual_balance');
        });
    }
};
