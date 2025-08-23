<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandImage extends Model
{
    protected $guarded = ['id'];

    public function land(){
        return $this->belongsTo(Land::class, 'land_id');
    }
}
