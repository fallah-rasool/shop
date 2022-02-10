<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Product $product)
    {
        return view('admin.discounts.create',[
            'product'=>$product,
        ]);
    }


    public function store(Product $product,DiscountRequest $request)
    {
        $product->addDiscount($request);
        return redirect(route('product.create'));
    }

    public function show(Product $product)
    {

    }

    public function edit(Product $product,Discount $discount)
    {
        return view('admin.discounts.edit',[
            'product'=>$product,
            'discount'=>$discount,
        ]);
    }

    public function update( Product $product ,DiscountRequest $request)
    {
        $product->addDiscount($request);
        return redirect(route('product.create'));
    }

    public function destroy(Product $product)
    {
        $product->discount()->delete();
        return back();
    }
}
