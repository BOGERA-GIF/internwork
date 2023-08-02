<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'business_name',
        'account_number',
        'contact_person_name',
        'contact_person_phone',
        'business_phone',
        'business_email',
        'PIN',
        'available_balance',
        'actual_balance',
        // Add other fillable attributes here
    ];

}
