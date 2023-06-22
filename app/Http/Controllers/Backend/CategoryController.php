<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //all category showing method
    public function index()
    {
    	return view('backend.category.category.index1');
    }
}
