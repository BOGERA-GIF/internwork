<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsLog extends Model
{
    // use HasFactory;
    protected $table = 'transactions_log';
    protected $fillable = [
        'customer_id',
        'amount',
        'narrative ',
        'reference',
        'status',
        
        // Add other fillable attributes here
    ];
}
