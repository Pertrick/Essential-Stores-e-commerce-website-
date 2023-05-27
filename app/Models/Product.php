<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Traits\Uuid;
use App\Models\Review;
use App\Models\Category;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Uuid, CreatedUpdatedBy;

    protected $fillable = [
        'name',
        'old_price',
        'new_price',
        'description',
        'quantity',
        'image',
        'created_by',

    ];

    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function getCreatedByBrowseAttribute(){
        return $this->users->name;
    }

    public function getCreatedByReadAttribute(){
        return $this->users->name;
    }

    public static function currentMonth(){
        return Carbon::now()->format('F');
    }

}
