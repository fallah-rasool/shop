<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\BrandCreateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $brands=Brand::query()->paginate();
        return view('admin.brands.index',compact('brands'));
    }

    public function store(BrandCreateRequest $request)
    {


        $path=$request->file('image')->storeAs('public/image-brand',$request->file('image')->getClientOriginalName());
        Brand::query()->create([
            'name'=>$request->get('name'),
            'image'=>$path,
        ]);
        return back()->with('success','برند جدید با موفقیت اضافه شد ');
    }


    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $path = $brand->image;
        if($request->hasFile('image')){
            unlink(str_replace('public','storage',$brand->image));
            $path=$request->file('image')->storeAs('public/image-brand',$request->file('image')->getClientOriginalName()
            );
        }
        $brand->update([
            'name'=>$request->get('name'),
            'image'=>$path,
        ]);
        return redirect(route('brand.create'));
    }

    public function destroy(Brand $brand)
    {
        unlink(str_replace('public','storage',$brand->image));
        $brand->delete();
        return back();
    }
}
