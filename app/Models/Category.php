<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

//    برای نمایش دسته بندی ها در لیست پنل
    public function parent(){
        return $this->belongsTo(Category::class,'patent_id');
    }
    public function children(){
        return $this->hasMany(Category::class,'patent_id');
    }


    ////// برای نمایش فرزندان دسته بندی ها در صفحه اول سایت/////
    public  function getAllSubCategoryProducts(){
          $children=$this->children()->pluck('id');
          return product::query()->whereIn('category_id',$children)->get();
    }

}
