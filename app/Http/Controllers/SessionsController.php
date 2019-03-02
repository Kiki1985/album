<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    


    public function create(){
    	return view('sessions/create');
    }


    public function store(){
    	if(! auth()->attempt(request(['name', 'password'])))
    	{
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}return redirect('/albums');
    }


    public function destroy(){
    	auth()->logout();

    	return redirect('/');
    	
    }
}
