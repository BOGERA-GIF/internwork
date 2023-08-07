<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateExistingCustomersHashPins extends Migration
{
    public function up()
    {
        $customers = DB::table('customers')->get();

        foreach ($customers as $customer) {
            $hashedPin = Hash::make($customer->pin);

            DB::table('customers')
                ->where('id', $customer->id)
                ->update(['pin' => $hashedPin]);
        }
    }

    public function down()
    {
        // If needed, implement the reverse logic in the down method
    }
}