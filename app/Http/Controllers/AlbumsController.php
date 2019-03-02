<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;


class AlbumsController extends Controller
{
    

    public function index()
    {
    	$albums = Album::where('user_id', '=', auth()->user()->id)->get();
    	return view('home', compact('albums'));
    }

    public function store()
    {
    	Album::create([ 
            'name' => request('name'),
            'number_of_stickers' => request('number_of_stickers'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/albums');
    }


    public function show(Album $album)
    {
		return view('albums.show', compact('album'));
    }

}