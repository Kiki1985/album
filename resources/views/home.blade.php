@extends('layout')
@section('content')
<p><b><i>Albums</i></b> <span style="float: right">User {{Auth::user()->name}}</span></p>
<div id="bn" style="float: right; margin-bottom: 10px">
<a href="/logout"><button>Logout</button></a>
</div>
<hr style="clear: both;">
<div>

<form method="POST" action="/albums">
@csrf
	<input type="text" name="name" placeholder="The Album Name" required>
	<input type="text" name="numStickers" placeholder="Number Of Stickers" required>
	<button>Submit</button>
</form>

<table>
<tr>
	<th>The album name</th>
    <th>Number of stickers</th>
</tr>

@foreach($albums as $album)
<tr>
	<td><a href="/albums/{{$album->id}}">{{$album->name}}</a></td>
	<td>{{$album->numStickers}}</td>
</tr>
@endforeach
</table>
</div>
@endsection
