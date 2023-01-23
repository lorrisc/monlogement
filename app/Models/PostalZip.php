<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalZip extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_postal_zip'
    ];

    public function Alert(){
        return $this->hasMany(Alert::class);
    }

    public function CitiePostalZip(){
        return $this->hasMany(CitiePostalZip::class);
    }

    public function Propertie(){
        return $this->hasMany(Propertie::class);
    }
}
