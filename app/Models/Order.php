<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'quantity',
        'price',
        'payment_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
