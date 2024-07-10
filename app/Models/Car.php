<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "car_model_id",
        "car_manufacture_id",
        "year"
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, "car_model_id", "id");
    }

    public function manufacture(): BelongsTo
    {
        return $this->belongsTo(CarManufacture::class, "car_manufacture_id", "id");
    }
}
