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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->default('');
            $table->string('last_name', 255)->default('');
            $table->string('phone', 255)->default('');
            $table->string('email', 255)->default('');
            $table->string('designation', 255)->default('');
            $table->string('business_email', 255)->default('');
            $table->string('password', 255)->default('');
            $table->dateTime('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            // Add a unique constraint for email
            $table->unique('email', 'UK_users_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
