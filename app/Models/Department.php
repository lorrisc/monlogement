<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_department'
    ];

    public function Alert(){
        return $this->hasMany(Alert::class);
    }

    public function Citie(){
        return $this->hasMany(Citie::class);
    }
}
