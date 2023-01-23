<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertPropertyType extends Model
{
    use HasFactory;

    protected $table = 'alert_property_type';

    protected $fillable = [
        'alert_id',
        'property_type_id'
    ];

    public function Alert(){
        return $this->belongsTo(Alert::class);
    }

    public function PropertyType(){
        return $this->belongsTo(PropertyType::class);
    }
}
