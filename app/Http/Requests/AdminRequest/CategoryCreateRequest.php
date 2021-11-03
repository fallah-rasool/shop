<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title_fa' =>'required|unique:categories,title_fa',
            'title_en' =>'nullable|unique:categories,title_en',
            ];
    }
}
