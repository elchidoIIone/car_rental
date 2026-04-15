<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'rental_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status',
        'payment_date',
    ];

    public function rental_id(){
        return $this->belongsTo(RentalModel::class);
    }
}
