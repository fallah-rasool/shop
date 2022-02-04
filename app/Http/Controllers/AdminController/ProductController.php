<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductCreateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        return view('admin.products.index',[
            'products'=>Product::query()->paginate(),
            'selectCategories'=>Category::all(),
            'selectBrands'=>Brand::all(),
        ]);
    }
    public function store(ProductCreateRequest $request)
    {
        $name_product=time().'.'.$request->file('image')->getClientOriginalExtension();

        $path=$request->file('image')->storeAs('public/image-product',$name_product);
        Product::query()->create([
            'category_id'=>$request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
            'name'=>$request->get('name'),
            'slug'=>$request->get('slug'),
            'price'=>$request->get('price'),
            'image'=>$path,
            'description'=>$request->get('description'),
        ]);
        return back()->with('success','محصول جدید با موفقیت اضافه شد ');

    }

    public function show(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        //
    }
    public function update(Request $request, Product $product)
    {
        //
    }
    public function destroy(Product $product)
    {
        unlink(str_replace('public','storage',$product->image));
        $product->delete();
        return back();
    }
}
