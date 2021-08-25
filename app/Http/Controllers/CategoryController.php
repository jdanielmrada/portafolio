<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
    }
    public function index()
    {
        $categories= Category::all();
        return view('category-index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $category= new Category($request->all());
        $category->save();

        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category= Category::find($id);
        $category->delete();

        
        return redirect()->route('category.index');
    }
}
