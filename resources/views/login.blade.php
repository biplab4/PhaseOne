@extends('layouts.master')

@section('content')





<div class="container mt-5">
    <div class="row py-5">
        <div class="col-sm-4 mx-auto">
            <h3 class="text-primary">Login Form</h3>
            <!-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>

            @endforeach
            
        </ul>
    </div>
    @endif -->

        <form method="POST" action="{{ route('loged')}}">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    </div>
</div>



@endsection()