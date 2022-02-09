<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        "place_id",
        "title",
        "sub_title",
        'image',
        'content',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
