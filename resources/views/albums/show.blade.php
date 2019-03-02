@extends('layouts/layout')

@section('content')

		<h1 class="jumbotron-heading"><h1>{{$album->name}}</h1></h1>
          <p class="lead text-muted">Number of stickers: {{$album->number_of_stickers}}</p>

          <div class="row">

          @for ($i = 1; $i <= $album->number_of_stickers; $i++)
	
		<div style="
					height: 150px;
					width: 100px;
					padding: 5px;
					margin: 5px;
					float:left;
					background-color:lightblue;
 					">
			{{ $i }}
			<p>Number of stickers: 0</p>
		</div>
          @endfor
        </div>
        <br><br>
      

@endsection