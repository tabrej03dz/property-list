<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Enquiry extends Model
{
    protected $guarded = ['id'];

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function enquirable(): MorphTo { return $this->morphTo(); }
}
