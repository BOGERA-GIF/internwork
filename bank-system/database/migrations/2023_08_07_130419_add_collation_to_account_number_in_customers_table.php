<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollationToAccountNumberColumnInCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('account_number', 20)->collation('utf8_unicode_ci')->change();
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Revert the changes if needed
        });
    }
}






