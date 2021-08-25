<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Image;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles= Article::all();
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });
        return view('article-index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories= Category::all();
      return view('article-create')
      ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $article= new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        //dd($request->file('image'));
        //Manipuración de archivo
        if($request->file('image')){
            $file= $request->file('image');
            $count =count($file);
            for ($i=0; $i < $count ; $i++) {
                $foto = $file[$i];
                $name= uniqid();
                $path= public_path() . '/image/articles/';
                $foto->move($path, $name);
                //dd($foto);

                $image= new Image();
                $image->name= $name;
                $image->article()->associate($article);
                $image->save();
            }

            /*foreach($file as $files){

                $name= 'articles_' . time() . '.' .$files->getClientOriginalExtension();
                $path= public_path() . '/image/articles/';
                $files->move($path, $name);
            }*/
         //   $name= 'articles_' . time() . '.' .$file->getClientOriginalExtension();

        //    $file->move($path, $name);
           // dd($count);

        }


       // dd($article);


           
            return redirect()->route('article.index');

    }


    public function show($id)
    {
        $article= Article::find($id);
        $article->delete();

        
        return redirect()->route('article.index');
    }


    public function edit($id)
    {
      $article= Article::find($id);
      $categories= Category::all();

      return view('article-edit')
                  ->with('article',$article)
                  ->with('categories',$categories);
    }

    public function update(Request $request, $id)
    {

        $article= Article::find($id);
        $article->fill($request->all());
        $article->save();

        return redirect()->route('article.index');
    }

}
