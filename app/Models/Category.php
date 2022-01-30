<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function parent(){
        return $this->belongsTo(Category::class,'patent_id');
    }

    public function children(){
        return $this->hasMany(Category::class,'patent_id');
    }
}