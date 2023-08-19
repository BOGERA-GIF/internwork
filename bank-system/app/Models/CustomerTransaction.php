<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    use HasFactory;

    protected $table = 'customer_transactions'; // Adjust the table name if needed

    protected $fillable = [
        'customer_id',
        'transaction_id',
         'type',
        'amount',
        'narrative',
        'status',
        'balance_before',
        'balance_after'
        // ... other attributes ...
    ];
}
