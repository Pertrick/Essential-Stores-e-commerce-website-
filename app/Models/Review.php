<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Traits\Uuid;
use Carbon\Carbon;

class Review extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'text',
        'product_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
}
