<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_zip_id',
        'citie_id',
        'department_id',
        'account_id',
        'post_type_id',
        'email',
        'min_price',
        'max_price',
        'min_number_room',
        'max_number_room',
        'min_surface',
        'max_surface',
        'min_number_bedroom',
        'max_number_bedroom',
        'min_number_bathroom',
        'max_number_bathroom',
        'min_number_wc',
        'max_number_wc',
        'min_surface_field',
        'max_surface_field',
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
        'energy_consumption'
    ];

    public function PostalZip(){
        return $this->belongsTo(PostalZip::class);
    }

    public function Citie(){
        return $this->belongsTo(Citie::class);
    }

    public function Department(){
        return $this->belongsTo(Department::class);
    }

    public function Account(){
        return $this->belongsTo(Account::class);
    }

    public function PostType(){
        return $this->belongsTo(PostType::class);
    }

    public function AlertPropertyType(){
        return $this->hasMany(AlertPropertyType::class);
    }
}
