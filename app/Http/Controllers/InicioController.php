<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class InicioController extends Controller
{
    public function index()
    {
        
        $portafolios = Article::orderBy('id','DESC')->paginate(6);
	    $portafolios->each(function($portafolios){
            $portafolios->images;
           });

          // dd($portafolios);
        return view('welcome')->with('portafolios',$portafolios);
    }
}
