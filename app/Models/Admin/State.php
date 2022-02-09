<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = ['*'];

    use HasFactory;

    public function city()
    {
        return $this->hasOne(City::class);
    }
}
