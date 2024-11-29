<?php

namespace App\Models;

use Database\Factories\DriverFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    /** @use HasFactory<DriverFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'drivers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'surname',
        'id_number'
    ];
}
