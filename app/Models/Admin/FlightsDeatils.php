<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightsDeatils extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "from",
        'to',
        'flight',
        'date',
        'dep',
        'arr',
        'bag',
        'refound',
        'meals'
    ];
}
