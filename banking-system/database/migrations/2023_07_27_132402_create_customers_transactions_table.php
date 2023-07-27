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
        Schema::create('customers_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->double('amount')->default(0);
            $table->string('narrative', 255)->default('');
            $table->enum('type', ['UNIDENTIFIED', 'CR', 'DR'])->default('UNIDENTIFIED');
            $table->double('balance_before')->default(0);
            $table->double('balance_after')->default(0);
            $table->dateTime('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('completion_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Define the foreign key constraints
            $table->foreign('transaction_id')->references('id')->on('transactions_logs')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_transactions');
    }
};
