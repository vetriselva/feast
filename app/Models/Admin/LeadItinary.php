<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadItinary extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "days",
        'activity_id',
        'DayActivity',
        'Transfers',
        'breack',
        'lunch',
        'dinner',
        'PlacesName',
        'others',
        'Tickets',
        'city' , 
        'hotal' ,
        'hotal_room_type' ,
        'star_ratings' ,
        'hotal_night'
    ];

    public function Activity() {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

    public function itineraryDayActivities()
    {
        return $this->hasMany(ItineraryDayActivity::class,'itinerary_id', 'id');
    }

}