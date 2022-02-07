<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryDayActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'itinerary_id',
        'dayactivity_id'
    ];

    public function dayActivity()
    {
        return $this->belongsTo(DayActivity::class,'dayactivity_id','id');
    }
}
