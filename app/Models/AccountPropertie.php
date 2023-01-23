<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPropertie extends Model
{
    use HasFactory;
    
    protected $table = 'account_propertie';

    protected $fillable = [
        'account_id',
        'propertie_id'
    ];

    public function Account(){
        return $this->belongsTo(Account::class);
    }

    public function Propertie(){
        return $this->belongsTo(Propertie::class);
    }
}
