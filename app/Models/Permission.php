<?php

namespace App\Models;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    /** @use HasFactory<PermissionFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'guard_name'
    ];
}
