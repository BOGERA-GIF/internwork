<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Foundation\Auth\Customer as Authenticatable;

class Customer extends Authenticatable implements AuthenticatableContract 
{  

    use Notifiable;
    protected $guard = 'customers';
    public function findForPassport($username) {
        return $this->where('account_number', $username)->first();
    }
    
    // protected $table = 'customers';
    protected $fillable = [
        'business_name',
        'account_number',
        'contact_person_name',
        'contact_person_phone',
        'business_phone',
        'business_email',
        'pin',
        'available_balance',
        'actual_balance',
        // Add other fillable attributes here
    ];

    
    public function getAuthIdentifierName()
    {
        return 'id'; // Replace with the primary key column name of your Customer table
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->pin;
    }

    public function transactions()
    {
        return $this->hasMany(CustomerTransaction::class);
    }
}