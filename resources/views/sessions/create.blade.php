@extends('layout')
@section('content')
    <p>Log in page</p>
    <hr>
    <form method="POST" action="/login">
    @csrf
      <input type="text" name="name" placeholder="Name"><br><br>
      <input type="password" name="password" placeholder="password"><br><br>
      <button>Log in</button>
    </form>
    <br><br>
    <a href="/"><button>Back</button></a>
@endsection