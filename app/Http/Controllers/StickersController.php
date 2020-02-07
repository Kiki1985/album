<?php
namespace App\Http\Controllers;
use DB;

class StickersController extends Controller
{
    public function store(){
	    DB::table('stickers')
	        ->updateOrInsert(
	        ['albumId' => request('albumId'), 'stickerId' => request('stickerId')],
	        ['duplicates' => request('duplicates')]
	    );
	    return response();
    }
}