<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'propertie_id',
        'position_id',
        'url'
    ];

    public function Propertie(){
        return $this->belongsTo(Propertie::class);
    }

    public function Position(){
        return $this->belongsTo(Position::class);
    }
}
