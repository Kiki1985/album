@extends('layout')
@section('content')
<p><b><i>{{$album->name}}</i></b> Number of stickers: {{$album->number_of_stickers}}</p>
<p>User {{Auth::user()->name}}</p>
<div><a href="/albums"><button>Back</button></a><a href="/logout"><button>Logout</button></a></div>
<hr>
@for ($i = 1; $i <= $album->number_of_stickers; $i++)
<div style="border: 1px solid LightBlue; margin: 20px ; padding: 20px 20px; width: 120px">
<div>{{$i}}
<button id="{{$i.'plus'}}">+</button>
<button id="{{$i.'minus'}}">-</button>
<span class="{{$i}}">
@if($stickers = DB::table('stickers')->where('album_id', $album->id)->where('sticker_id', $i)->exists())
{{$stickers = DB::table('stickers')->where('album_id', $album->id)->where('sticker_id', $i)->value('sticker_number')}}
@else
{{$stickers = 0}}
@endif
</span></div></div>
<script type="text/javascript">
document.getElementById("{{$i.'plus'}}").addEventListener("click", function() {
  insert({{$i}}, this);
  });
document.getElementById("{{$i.'minus'}}").addEventListener("click", function() {
  insert({{$i}}, this);
});
</script>
@endfor
<script type="text/javascript">
var xhr = new XMLHttpRequest();

function insert(sticker_id, obj){
	var btn = obj.innerHTML;
	var sticker_number = document.getElementsByClassName(sticker_id)[0].innerHTML;
	if(btn === '+'){
		sticker_number++;
	}else{
		sticker_number--;
    	if(sticker_number<0){
    		sticker_number=0;  
    	}
	}
	xhr.open('GET','/albums/{album}/stickers?album_id={{$album->id}}&sticker_id='+sticker_id+'&sticker_number='+sticker_number+'', true);
	xhr.send(); 
	xhr.onreadystatechange = function(){
		if(xhr.readyState === 4){
		    window.location.reload();
		}
	}
}
</script>
@endsection