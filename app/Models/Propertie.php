<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_zip_id',
        'citie_id',
        'account_id',
        'post_type_id',
        'property_type_id',
        'publication_date',
        'modification_date',
        'description',
        'street',
        'price',
        'number_room',
        'surface',
        'bedroom',
        'bathroom',
        'wc',
        'surface_field',
        'balcony',
        'terrace',
        'cellar',
        'car_park',
        'garden',
        'digicode',
        'intercom',
        'guardian',
        'lift',
        'chimney',
        'pool',
        'separate_toilet',
        'furniture',
        'unfurnished',
        'expanded_fiber',
        'electric_vehicle_charging',
        'duplex',
        'last_stage',
        'ground_floor',
        'avoid_ground_floor',
        'energy_consumption_value'
    ];

    public function AccountPropertie(){
        return $this->hasMany(AccountPropertie::class);
    }

    public function PostalZip(){
        return $this->belongsTo(PostalZip::class);
    }

    public function Citie(){
        return $this->belongsTo(Citie::class);
    }

    public function Account(){
        return $this->belongsTo(Account::class);
    }

    public function PostType(){
        return $this->belongsTo(PostType::class);
    }

    public function PropertyType(){
        return $this->belongsTo(PropertyType::class);
    }

    public function PropertyPhoto(){
        return $this->hasMany(PropertyPhoto::class);
    }
    
}
