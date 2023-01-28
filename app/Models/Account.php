<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'account_type_id',
        'email',
        'firstname',
        'surname',
        'phone',
        'password',
        'display_email',
        'display_phone',
        'agency_name',
        'website',
        'siret',
        'photo_agency_url',
        'reset_password_token',
        'expiration_token_date'
    ];

    public function AccountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function AccountPropertie()
    {
        return $this->hasMany(AccountPropertie::class);
    }

    public function Alert()
    {
        return $this->hasMany(Alert::class);
    }

    public function Propertie()
    {
        return $this->hasMany(Propertie::class);
    }
}
