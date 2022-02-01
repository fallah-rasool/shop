<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_fa' =>'required|unique:categories,title_fa',
            'title_en' =>'required|nullable|unique:categories,title_en',
        ];
    }
}
