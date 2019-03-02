@extends('layouts/layout')



@section('content')


<form class="form-signin" method="POST" action="/register">
 {{ csrf_field() }}
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registration form</h1>
      <label for="name" class="sr-only">Name</label>
      <input type="text" id="name" class="form-control" placeholder="Name" name="name" required autofocus>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
       <label for="password_confirmation" class="sr-only">Password Confirmation</label>
      <input type="password" id="password_confirmation" class="form-control" placeholder="Password Confirmation" name="password_confirmation" required>
      <div class="checkbox mb-3">
      @include ('errors')
        
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
   


@endsection