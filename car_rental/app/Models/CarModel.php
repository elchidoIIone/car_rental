<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'license_plate',
        'miliage',
        'lat',
        'ing',
        'is_premium',
        'rental_count',
        'daily_rate',
        'status',
    ];
    public function brand_id(){
        return $this->belongsTo(BrandModel::class);
    }
}
