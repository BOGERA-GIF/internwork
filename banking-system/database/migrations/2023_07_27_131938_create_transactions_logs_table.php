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
        Schema::create('transactions_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->double('amount')->default(0);
            $table->string('narrative', 255)->default('');
            $table->string('reference', 255)->default('')->unique();
            $table->string('status', 255)->default('');
            $table->string('payment_gateway_reference', 255)->default('');
            $table->text('trace')->nullable();
            $table->dateTime('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->dateTime('completion_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            // Define the foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_logs');
    }
};
