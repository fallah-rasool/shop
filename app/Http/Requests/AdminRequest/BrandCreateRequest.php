<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|unique:brands,name',
            'image'=>'required|mimes:jpg,png,jpeg|max:512'
        ];
    }
}
