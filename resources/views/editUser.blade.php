@extends('layouts.master')
 
@section('content')


<form action="{{ route('update',$store->id) }}" method="POST" class="mx-auto w-25">
    @csrf
    
    <div class="form-group pt-5">
      <h3 class="text-success text-center">EDIT YOUR DETAILS HERE!</h3>
    <label for="username">User Name</label>
      <input type="text" class="form-control" name="username" value="{{ $store->username }}" id="username" aria-describedby="emailHelp" placeholder="Enter your username" required>
    </div>
      <div class="form-group">
      
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" value="{{ $store->email }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" required>
      
    </div>

    <button type="submit" class="btn btn-success"> <a class="text-light" href="{{ route('changepassword',$store->id) }}">Password change</a></button>
    
  
    <button type="submit" class="btn btn-primary">Update</button>

</form>




@endsection()