<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Album;
use App\Sticker;
class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::where('user_id', '=', auth()->user()->id)->get();
        return view('home', compact('albums'));
    }

    public function show(Album $album){
        for ($i = 1; $i <= $album->numStickers; $i++){
        $sticker = Sticker::where([['album_id', '=',  $album->id], ['sticker_id', '=', $i]]);
            if(!($sticker->exists())){
               Sticker::create([
                'album_id' => $album->id,
                'sticker_id' => $i
               ]);
            }
        }   
        return view('albums.show', compact('album'));
    }

    public function store(){
        Album::create([
            'name' => request('name'),
            'numStickers' => request('numStickers'),
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
}
