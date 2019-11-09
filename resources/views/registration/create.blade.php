@extends('layout')
@section('content')
    <p>Create an account</p>
    <hr><br>
    <form method="POST" action="/register">
    @csrf
      <input type="text" name="name" placeholder="Name"><br><br>
      <input type="text" name="email" placeholder="email"><br><br>
      <input type="password" name="password" placeholder="password"><br><br>
      <button>Register</button>
    </form>
    <br><br>
    <a href="/"><button>Back</button></a>
@endsection