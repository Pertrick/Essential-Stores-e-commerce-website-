<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Traits\CreatedUpdatedBy;

class Category extends Model
{
    use HasFactory,CreatedUpdatedBy;

    protected $fillable =[
        'name'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCreatedByBrowseAttribute(){
        return $this->users->name;
    }

    public function getCreatedByReadAttribute(){
        return $this->users->name;
    }
}
