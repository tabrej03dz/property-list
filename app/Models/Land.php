<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Land extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    protected $casts = [
        'documents' => 'array',
    ];

    public function images(){
        return $this->hasMany(LandImage::class, 'land_id');
    }
}
