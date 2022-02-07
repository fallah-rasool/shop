<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;

class indexController extends Controller
{
    public function index(){

      return view('client.index');

    }
}
