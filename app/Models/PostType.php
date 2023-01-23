<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lib_post_type'
    ];

    public function Alert(){
        return $this->hasMany(Alert::class);
    }
    
    public function Propertie(){
        return $this->hasMany(Propertie::class);
    }
}
