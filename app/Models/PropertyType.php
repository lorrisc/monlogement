<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'lib_property_type'
    ];

    public function AlertPropertyType(){
        return $this->hasMany(AlertPropertyType::class);
    }
    
    public function Propertie(){
        return $this->hasMany(Propertie::class);
    }
}
