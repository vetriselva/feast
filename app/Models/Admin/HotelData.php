<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelData extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        'image',
        "location"
    ];
}
