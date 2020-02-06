@extends('layout')
@section('content')
<p><b><i>{{$album->name}}</i></b> Number of stickers: {{$album->number_of_stickers}}<span style="float: right">User {{Auth::user()->name}}</span></p>
<div><a href="/albums"><button>Back</button></a>
<a href="/logout"><button>Logout</button></a></div>
<hr>
@for ($i = 1; $i <= $album->number_of_stickers; $i++)
<div style="border: 1px solid LightBlue; margin: 20px ; padding: 20px 20px; width: 100px">
	<div class="stickerId" style="float: left; margin-right: 12px">{{$i}}</div>
	<button class="operation">-</button>
	<button class="operation">+</button>
	<div class="stickerNumber" style="float: right;" id="{{$i}}">{{$stickerNumber[$i-1]}}</div>
</div>
@endfor
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
	$(".operation").click(function(){
	stickerId = stickerNumber = $(this).closest("div").find('.stickerId').text();
	operation = $(this).text();
	stickerNumber = $(this).closest("div").find('.stickerNumber').text();
	if(operation === "+") stickerNumber++;
	if(operation === "-") stickerNumber--;
	if(stickerNumber < 0) stickerNumber = 0;
	$(this).closest("div").find('.stickerNumber').text(stickerNumber);
	$.get('/albums/{album}/stickers?album_id={{$album->id}}&sticker_id='+stickerId+'&sticker_number='+stickerNumber+'');
	});
</script>
@endsection