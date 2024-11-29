<?php

namespace App\Models;

use Database\Factories\DeliveryScheduleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliverySchedule extends Model
{
    /** @use HasFactory<DeliveryScheduleFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'delivery_schedule';

    protected $primaryKey = 'id';

    protected $fillable = [
        'package_id',
        'customer_id',
        'driver_assignment_id',
        'vehicle_assignment_id',
        'user_id',
        'delivery_type',
        'delivery_notes',
        'assigned_at',
        'collected_at',
        'delivered_at'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * @return BelongsTo
     */
    public function driverAssignment(): BelongsTo
    {
        return $this->belongsTo(DriverAssignment::class);
    }
}
