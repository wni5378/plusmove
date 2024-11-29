<?php

namespace App\Models;

use Database\Factories\VehicleAssignmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleAssignment extends Model
{
    /** @use HasFactory<VehicleAssignmentFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_assignments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'user_id',
        'assigned_at'
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
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
