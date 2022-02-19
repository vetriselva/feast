<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        "state_id",
        "city_id",
        "title",
        "sub_title",
        'image',
        'content',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
