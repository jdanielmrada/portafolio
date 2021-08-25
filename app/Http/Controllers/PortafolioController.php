<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function portaf()
    {
        $articles= Article::orderBy('id','DESC')->paginate(6);
        $articles->each(function($articles){
            $articles->images;
            $articles->tags;
        });
        return view('galeria')->with('articles',$articles);
    }
}
