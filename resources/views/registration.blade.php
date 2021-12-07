@extends('layouts.master')
 
@section('content')
 
<div class="container mt-5">

<div class="row" py-4>
    <div class="col-sm-4 mx-auto">
        <h3 class="text-success">User Registration Form</h3>
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>

            @endforeach
            
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('registered')}}">
    @csrf
  <div class="form-group">

  <label for="username">User Name</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter your username" required>
  </div>
    <div class="form-group">
    
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter your Password" required>
  </div>
 
  <div class="form-group">
    <label for="exampleconfirmPassword1"> Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" id="exampleconfirmPassword1" placeholder="Confirm your Password" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
</div>


@endsection()
