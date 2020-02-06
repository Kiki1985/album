<?php
namespace App\Http\Controllers;
use DB;

class StickersController extends Controller
{
    public function store(){
	    DB::table('stickers')
	        ->updateOrInsert(
	        ['album_id' => request('album_id'), 'sticker_id' => request('sticker_id')],
	        ['sticker_number' => request('sticker_number')]
	    );
	    return response();
    }
}