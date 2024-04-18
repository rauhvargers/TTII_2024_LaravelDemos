<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'carmodel_id',
        'fuel_id', 'country_id', 'registration_year'
    ];

    
}
