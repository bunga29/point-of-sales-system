<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'total',
        'payment_type_id',
        'description',
        'discount',
    ];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
