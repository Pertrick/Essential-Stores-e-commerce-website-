<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait CreatedUpdatedBy
{
   public static function bootCreatedUpdatedBy(){
    static::creating(function($model){
        if($model->isClean('created_by')){
            $model->created_by = auth()->user()->id;
        }
    });
   }
}