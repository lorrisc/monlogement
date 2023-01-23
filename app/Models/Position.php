<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_position'
    ];

    public function PropertyPhoto(){
        return $this->hasMany(PropertyPhoto::class);
    }
}
