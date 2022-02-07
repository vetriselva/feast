<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        "packageName",
        "subTitle",
        "leadNumber",
        "placeToVisit",
        "itDate",
        "itValidDate",
        "departureDate",
        "numOfNights",
        "roomType",
        "flight_id",
        "costingNotes",
        "routeMap",
        "pack_includs",
        "pack_excluds",
        "payment_poly",
        "refound_poly",
        "cancle_poly",

    ];
    public function LeadItinary()    {
        return $this->hasMany(LeadItinary::class, 'lead_id', 'id');
    }
    public function FlightsDeatils() {
        return $this->hasMany(FlightsDeatils::class, 'lead_id', 'id');
    }
    public function HotalsDeatils() {
        return $this->hasMany(HotalsDeatils::class, 'lead_id', 'id')->orderBy('HotelOptionNumber','ASC');
    }
    public function CostDeatils() {
        return $this->hasMany(CostDeatils::class, 'lead_id', 'id')->orderBy('HotelOptionNumber','ASC');
    }

   //  DATA BASE
    public function FlightData() {
        return $this->belongsTo(FlightData::class, 'flight_id', 'id');
    } 
} 