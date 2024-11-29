<?php

namespace App\Models;

use Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    /** @use HasFactory<VehicleFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'make',
        'model',
        'year',
        'registration_number',
        'mileage'
    ];
}
