<?php
namespace App\Http\Controllers;

use App\Sticker;

class StickersController extends Controller
{
    public function store()
    {
        $sticker =Sticker::where([['album_id','=',request('albumId')],['sticker_id','=',request('stickerId')]]);
        if (request('operation') === '-') {
            $sticker->where('duplicates', '>', 1);
            $sticker->decrement('duplicates');
        }
        if (request('operation') === '+') {
            $sticker->increment('duplicates');
        }
        return response();
    }
}
