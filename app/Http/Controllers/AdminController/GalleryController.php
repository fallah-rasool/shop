<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductGalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function index(Product $product)
    {
       return view('admin.galleries.index',[
           'product'=>$product
       ]);
    }

    public function create()
    {
        //
    }


    public function store(ProductGalleryRequest $request,Product $product)
    {
        $product->addGallery($request);
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

    public function destroy(Product $product,Gallery $gallery)
    {
     $product->deleteGallery($gallery);

       return back();
    }
}
