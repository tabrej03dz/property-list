<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $guarded = ['id'];

    public function properties(){
        return $this->hasMany(Property::class, 'property_type_id');
    }
}
