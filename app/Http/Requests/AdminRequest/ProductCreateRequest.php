<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'name'=>'required',
            'slug'=>'required|unique:products,slug|alpha_dash',
            'image'=>'required|mimes:jpg,png,jpeg|max:1024',
            'price'=>'required|int|min:1000',
            'description'=>'required|max:1500',

        ];
    }
}
