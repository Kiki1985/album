@extends('layout')
@section('content')
<p><b><i>{{$album->name}}</i></b> Number of stickers: {{$album->numStickers}}<span style="float: right">User {{Auth::user()->name}}</span></p>
<div id="bn" style="float: right; margin-bottom: 10px">
<a href="/albums"><button>Back</button></a>
<a href="/logout"><button>Logout</button></a>
</div>
<hr style="clear: both;">
@foreach($album->stickers as $sticker)
<div style="border: 1px solid LightBlue; margin: 20px ; padding: 20px 20px; width: 150px">
	<div class="stickerId" style="float: left; margin-right: 20px">{{$sticker->sticker_id}}</div>
	<button class="operation">-</button>
	<button class="operation">+</button>
	<div class="duplicates" style="float: right;" id="{{$sticker->id}}">{{$sticker->duplicates}}</div>
</div>
@endforeach
<script type="text/javascript">
var CSRFtoken = $('meta[name="csrf-token"]').attr('content');
albumId = {{$album->id}};
	$(".operation").click(function(){
	stickerId  = $(this).closest("div").find('.stickerId').text();
	operation = $(this).text();
	duplicates = $(this).closest("div").find('.duplicates').text();
	if(operation === "+") duplicates++;
	if(operation === "-") duplicates--;
	if(duplicates < 1) duplicates = 1;
	$(this).closest("div").find('.duplicates').text(duplicates);
		$.ajax({
			url: '/albums/{{$album->id}}/stickers',
			type: 'post',
			data: {_token:CSRFtoken,albumId: albumId, stickerId: stickerId, operation:operation},
		});
	});

$(window).scroll(function(){
var bn = $('#bn');
	if($(window).scrollTop() > 30) {
    bn.css({position:'fixed', top:'10px', right:'8px'});
    }
    else{
    bn.css('position', 'static');
    }
});
</script>
@endsection