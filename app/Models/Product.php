<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
      return  $this->belongsTo(Category::class);
    }
    public function brand(){
      return  $this->belongsTo(Brand::class);
    }

//    gallery
    public function galleries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class);
    }

//    upload img to gallery
    public function addGallery(Request $request)
    {
        $name_product=time().'.'.$request->file('file')->getClientOriginalExtension();

        $path = $request->file('file')->storeAs(
            'public/productGallery',$name_product,
        );
        $this->galleries()->create([
            'product_id' => $this->id,
            'path' => $path,
           'mime' => $request->file('file')->getClientMimeType(),
         ]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
