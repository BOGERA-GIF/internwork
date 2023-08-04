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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 255)->default('');
            $table->string('account_number', 255)->default('');
            $table->string('contact_person_name', 255)->default('');
            $table->string('contact_person_phone', 255)->default('');
            $table->string('business_phone', 255)->default('');
            $table->string('business_email', 255)->default('');
            $table->string('pin', 255)->default('');
            $table->double('available_balance')->default(0);
            $table->double('actual_balance')->default(0);
            $table->dateTime('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->string('created_by', 255)->default('');

            // Add a unique constraint for account_number
            $table->unique('account_number', 'UK_customers_unique_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
