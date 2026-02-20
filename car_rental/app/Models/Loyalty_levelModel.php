<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loyalty_levelModel extends Model
{
    protected $table = 'loyalty_levels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'min_points',
        'discount_percentage',
        'free_extra_hours',
    ];
}
