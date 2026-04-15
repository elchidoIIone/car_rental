<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalModel extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'car_id',
        'driver_id',
        'pickup_date',
        'return_date',
        'total_amount',
        'status',
    ];

    public function user_id(){
        return $this->belongsTo(User::class);
    }
    public function car_id(){
        return $this->belongsTo(CarModel::class);
    }
    public function driver_id(){
        return $this->belongsTo(DriverModel::class);
    }
}
