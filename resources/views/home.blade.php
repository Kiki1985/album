@extends('layout')
@section('content')
<div style="float: left"><h2>Albums</h2></div>
<div style="float: right"><p>User {{Auth::user()->name}}</p></div>

<div style="clear: both;">
<form method="POST" action="/albums">
@csrf
	<input type="text" name="name" placeholder="The Album Name">
	<input type="text" name="stickers" placeholder="Number Of Stickers">
	<button>Submit</button>
</form>

<table>
<tr>
	<th>The album name</th>
    <th>Number of stickers</th>
</tr>
<a href="/logout"><button>Logout</button></a>
@foreach($albums as $album)
<tr>
	<td><a href="/albums/{{$album->id}}">{{$album->name}}</a></td>
	<td>{{$album->stickers}}</td>
</tr>
@endforeach
</table>
</div>
@endsection
