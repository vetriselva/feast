<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostDeatils extends Model
{
    use HasFactory;
    protected $fillable = [
        "lead_id",
        "optionNumber",
        'costingFor',
        'members',
        'costTotals',
    ];
}
