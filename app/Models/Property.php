<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    public function propertyType(){
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function images(){
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
