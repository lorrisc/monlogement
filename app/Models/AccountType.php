<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_account_type'
    ];

    public function Account(){
        return $this->hasMany(Account::class);
    }
}
