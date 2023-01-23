<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitiePostalZip extends Model
{
    use HasFactory;

    protected $table = 'cities_postal_zip';

    protected $fillable = [
        'citie_id',
        'postal_zip_id'
    ];

    public function Citie(){
        return $this->belongsTo(Citie::class);
    }

    public function PostalZip(){
        return $this->belongsTo(PostalZip::class);
    }
}
