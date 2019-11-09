@extends('layout')
@section('content')
<h1>Albums</h1>
<p>User {{Auth::user()->name}}</p>
<form method="POST" action="/albums">
@csrf
	<input type="text" name="name" placeholder="The Album Name">
	<input type="text" name="number_of_stickers" placeholder="Number Of Stickers">
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
	<td>{{$album->number_of_stickers}}</td>
</tr>
@endforeach
</table>
@endsection
