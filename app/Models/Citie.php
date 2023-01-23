<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_city',
        'department_id'
    ];

    public function Alert(){
        return $this->hasMany(Alert::class);
    }

    public function Department(){
        return $this->belongsTo(Department::class);
    }

    public function CitiePostalZip(){
        return $this->hasMany(CitiePostalZip::class);
    }

    public function Propertie(){
        return $this->hasMany(Propertie::class);
    }
}
