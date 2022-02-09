<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = ['*'];

    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function activity()
    {
        return $this->hasOne(Activity::class);
    }

    public function dayActivity()
    {
        return $this->hasOne(DayActivity::class);
    }
}
