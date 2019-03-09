@extends('layouts/layout')

@section('content')

		<h1 class="jumbotron-heading"><h1>{{$album->name}}</h1></h1>
          <p class="lead text-muted">Number of stickers: {{$album->number_of_stickers}}</p>

          <div class="row">

          @for ($i = 1; $i <= $album->number_of_stickers; $i++)
	
		<div id="{{ $i }}" style="
					height: 80px;
					width: 150px;
					padding: 20px;
					margin: 5px;
					float:left;
					background-color:lightblue;
 					">
			{{ $i }}
			
			
		<input class="btn btn-primary" type="button" value="+" onclick="plusFunction({{$i}})">
		<input class="btn btn-primary" type="button" value="-" onclick="minusFunction({{$i}})">
			<span class="{{ $i }}">0</span>
		</div>
          @endfor
        </div>
        <br><br>

        <script>

        	function plusFunction(broj){
        		var num = document.getElementsByClassName(broj)[0].innerHTML;
				num++;
				document.getElementsByClassName(broj)[0].innerHTML = num;

        	}

        	function minusFunction(broj){
        		var num = document.getElementsByClassName(broj)[0].innerHTML;
				num--;
				if(num<0){
                	num=0;  
    			}
				document.getElementsByClassName(broj)[0].innerHTML = num;
        	}

        </script>
      

@endsection