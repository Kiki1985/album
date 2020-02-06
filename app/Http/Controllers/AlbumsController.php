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

    public function show($id){
        $album = Album::find($id);
        $stickerNumber = array();
        for ($i = 1; $i <= $album->number_of_stickers; $i++){
            if(Sticker::where('album_id', $album->id)->where('sticker_id', $i)->exists()){
            array_push($stickerNumber, Sticker::where('album_id', $album->id)->where('sticker_id', $i)->value('sticker_number'));
            }else{
               array_push($stickerNumber, 0);
            }
        }   
            return view('albums.show', compact('album','stickerNumber'));
    }

    public function store(){
        Album::create([
            'name' => request('name'),
            'number_of_stickers' => request('number_of_stickers'),
            'user_id' => auth()->user()->id
        ]);
            return back();
    }
}
