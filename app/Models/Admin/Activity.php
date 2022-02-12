<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        "place_id",
        "title", 
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}