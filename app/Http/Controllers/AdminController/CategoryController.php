<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CategoryCreateRequest;
use App\Http\Requests\AdminRequest\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        $categories=Category::query()->paginate();
        $selectCategories=Category::all();

        return view('admin.categories.index',compact('categories','selectCategories'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = Category::query()->create([
            'patent_id' => $request->get('patent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);
        return back()->with('success','دسته بندی جدید با موفقیت اضافه شد ');
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',[

            'categories' => Category::all(),
            'category' => $category,
        ]);
    }


    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $categoryUpdate=Category::query()
            ->where('title_fa',$request->get('title_fa'))
            ->where('id','!=',$category->id )
            ->exists();
        if($categoryUpdate){

            return back()->with('title_fa','عنوان دسته بندی  تکراری است');
        }

        $category->update([
            'patent_id' =>$request->get('patent_id'),
            'title_fa' =>$request->get('title_fa'),
            'title_en' =>$request->get('title_en')
          ]);

        return redirect(route('category.create'));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
