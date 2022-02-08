<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotalsDeatils extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "city",
        'hotel_id',
        'hotal_room_type',
        'star_ratings',
        'hotal_night',
        'HotelOptionNumber'
    ];
    public function HotelData() {
        return $this->belongsTo(HotelData::class, 'hotel_id', 'id');
    }   
}
