@extends('layout')
@section('content')
<p><b><i>{{$album->name}}</i></b> Number of stickers: {{$album->number_of_stickers}}</p>
<p>User {{Auth::user()->name}}</p>
<div><a href="/albums"><button>Back</button></a><a href="/logout"><button>Logout</button></a></div>
<hr>
@for ($i = 1; $i <= $album->number_of_stickers; $i++)
<div style="border: 1px solid LightBlue; margin: 2px; padding: 0 20px;">
<p>{{$i}}
<button onclick="plusFunction({{$i}});window.location.reload();">+</button>
<button onclick="minusFunction({{$i}});window.location.reload();">-</button>
<span class="{{$i}}">
@if($stickers = DB::table('stickers')->where('album_id', $album->id)->where('sticker_id', $i)->exists())
{{$stickers = DB::table('stickers')->where('album_id', $album->id)->where('sticker_id', $i)->value('sticker_number')}}
@else
{{$stickers = 0}}
@endif
</span></p></div>
@endfor
<script type="text/javascript">
function plusFunction(broj){
	var num = document.getElementsByClassName(broj)[0].innerHTML;
	num++;
	var xhr = new XMLHttpRequest();
	xhr.open('GET','/albums/{album}/stickers?album_id={{$album->id}}&sticker_id='+broj+'&sticker_number='+num+'', true);
	xhr.send(); 
	xhr.onreadystatechange = function(){
		if(xhr.readyState === 4){
		    //alert(xhr.responseText);
		}
	}
}
function minusFunction(broj){
    var num = document.getElementsByClassName(broj)[0].innerHTML;
	num--;
    if(num<0){
    num=0;  
    }
	var xhr = new XMLHttpRequest();
	xhr.open('GET','/albums/{album}/stickers?album_id={{$album->id}}&sticker_id='+broj+'&sticker_number='+num+'', true);
	xhr.send(); 
	xhr.onreadystatechange = function(){
		if(xhr.readyState === 4){
		    //alert(xhr.responseText);
		}
	}
}
</script>
@endsection