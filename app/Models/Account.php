<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
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
        'photo_agency_url'
    ];

    public function AccountType(){
        return $this->belongsTo(AccountType::class);
    }

    public function AccountPropertie(){
        return $this->hasMany(AccountPropertie::class);
    }

    public function Alert(){
        return $this->hasMany(Alert::class);
    }
    
    public function Propertie(){
        return $this->hasMany(Propertie::class);
    }
}
