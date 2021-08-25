<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users=User::all();
        return view('user-index')->with('users',$users);
    }

    public function create()
    {
        return view('user-create');
    }

    public function store(Request $request)
    {
        $user= new User($request->all());
        $user->save();

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        
        $user= User::find($id);
        $user->delete();

        return redirect()->route('user.index');
    }

    public function passwordEdit($id){
        dd($id);
        
    }
}
