<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'amount',
        'transaction_id',
        'reference_id',
        'status',
        'user_id',
    ];

    public function orders()
    {
       return $this->hasMany(Order::class);
    }

    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
