<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function discount()
    {
        return $this->hasOne(Discount::class);
    }



//    upload img to gallery
    public function addGallery(Request $request)
    {
        $name_product=time().$request->file('file')->getClientOriginalName();

        $path = $request->file('file')->storeAs(
            'public/productGallery/',$name_product,
        );
        $this->galleries()->create([
            'product_id' => $this->id,
            'path' => $path,
           'mime' => $request->file('file')->getClientMimeType(),
         ]);
    }
//    delete img to gallery
    public function deleteGallery(Gallery $gallery )
    {
        Storage::delete($gallery->path);
        $gallery->delete();
    }

    // add  Discount
    public function addDiscount(Request $request)
    {
        if(!$this->discount()->exists()){
            $this->discount()->create([
                'product_id'=>$this->id,
                'value'=>$request->get('value'),
            ]);
        }else{
                $this->discount->update([
                    'product_id'=>$this->id,
                    'value'=>$request->get('value'),
                ]);
            }
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }
}
