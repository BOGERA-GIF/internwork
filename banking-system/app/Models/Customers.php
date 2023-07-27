<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Customer extends Model
{
    protected $fillable = [
        'name',
        'account_number',
        'phone',
        'create_date',
        'available_balance',
    ];

    // Additional properties or methods can be added here as per your requirements

    // Sample accessor method to format the phone number
    public function getFormattedPhoneAttribute()
    {
        // Assuming the phone format is CCCNNNXXXXXX (e.g., 256772123456)
        $phone = $this->attributes['phone'];
        return '+' . substr($phone, 0, 3) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6);
    }
};
