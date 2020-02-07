<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Album;
use App\Sticker;
class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::where('userId', '=', auth()->user()->id)->get();
        return view('home', compact('albums'));
    }

    public function show($id){
        $album = Album::find($id);
        $duplicates = array();
        for ($i = 1; $i <= $album->stickers; $i++){
        $sticker = Sticker::where([['albumId', '=',  $album->id], ['stickerId', '=', $i]]);
            if($sticker->exists()){
                array_push($duplicates, $sticker->value('duplicates'));
            }else{
               array_push($duplicates, 0);
            }
        }   
        return view('albums.show', compact('album','duplicates'));
    }

    public function store(){
        Album::create([
            'name' => request('name'),
            'stickers' => request('stickers'),
            'userId' => auth()->user()->id
        ]);
        return back();
    }
}
