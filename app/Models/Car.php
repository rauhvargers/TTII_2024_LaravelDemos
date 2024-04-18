<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'carmodel_id',
        'fuel_id', 'country_id', 'color_id', 'registration_year'
    ];

    public function carmodel(): BelongsTo
    {
        return $this->belongsTo(Carmodel::class);
    }



    public function fuel(): BelongsTo
    {
        return $this->belongsTo(Fuel::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
