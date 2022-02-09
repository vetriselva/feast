<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['*'];
    use HasFactory;

    public function place()
    {
        return $this->hasOne(Place::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
