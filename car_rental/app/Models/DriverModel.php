<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverModel extends Model
{
    protected $table = 'drivers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'license_number',
        'license_img',
    ];
}
