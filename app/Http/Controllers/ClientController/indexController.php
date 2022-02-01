<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;

class indexController extends Controller
{
    public function index(){

        $categories=Category::where('patent_id',null)->get();
        $brands=Brand::all();

        return view('client.index',compact('categories','brands'));

    }
}
