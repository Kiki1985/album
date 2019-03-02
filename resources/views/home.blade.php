@extends('layouts/layout')

@section('content')



	<form method="POST" action="/albums">
 	{{ csrf_field() }}

  
 		<br>
		
		  <input type="text" name="name" placeholder="The Album Name">

		  <input type="text" name="number_of_stickers" placeholder="Number Of Stickers">

		  <input type="submit" value="Submit">


	</form> 
	<br>

	<ul class="list-group list-group-flush">

	@foreach($albums as $album)
		<li class="list-group-item"><a href="/albums/{{$album->id}}">{{$album->name}} - <strong> {{$album->number_of_stickers}}</strong></a></li>

	@endforeach

	</ul><br><br>

	
	

	

@endsection