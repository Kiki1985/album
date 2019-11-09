<?php

namespace App\Http\Controllers;
use App\Album;
use App\Sticker;
use DB;
use Illuminate\Http\Request;


class StickersController extends Controller
{
    public function store(Sticker $sticker){
        $album_id = request('album_id');
        $sticker_number = request('sticker_number');
        $sticker_id = request('sticker_id');
        $stickers = DB::table('stickers')->where('album_id', $album_id)->where('sticker_id', $sticker_id)->exists();
            if($stickers == false) {
                Sticker::create([
                    'sticker_number' => request('sticker_number'),
                    'sticker_id' => request('sticker_id'),
                    'album_id' => request('album_id')
                    ]);
            } else {
                DB::table('stickers')->where('album_id', $album_id)
                                     ->where('sticker_id', $sticker_id)
                                     ->update(['sticker_number' => $sticker_number]);
            }
        return response();
    }
}