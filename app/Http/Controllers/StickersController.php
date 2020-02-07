<?php
namespace App\Http\Controllers;
use App\Sticker;

class StickersController extends Controller
{
    public function store(){
    	$sticker = Sticker::where([['albumId', '=',  request('albumId')], ['stickerId', '=', request('stickerId')]]);
    	if(request('operation') == '-'){
    			$sticker->where('duplicates', '>', 0);
    			$sticker->decrement('duplicates');
    	}

    	if(request('operation') == '+'){
    		if($sticker->exists()){
    			$sticker->increment('duplicates');
    		}else{
    			$sticker->insert(
    				['albumId' => request('albumId'), 'stickerId' => request('stickerId'), 'duplicates' => 1]
    			);
    		}
		}
		return response();
    }
}