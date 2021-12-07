@extends('layouts.master')
 
@section('content')

<div class="container mt-1">
  <div class="row">
      <div class="col-sm-4 mx-auto">
        @if(session()->has('success'))
        <h3>
         {{session()->get('success')}}
        </h3>
@endif
          <h2 class="text-danger py-5">Change Password</h2>
          <form action="{{ route('updatepassword',$key->id) }}" method="POST">
              @csrf
              <div class="form-group">
                  <input type="text" class="form-control" name="oldpassword" placeholder="Enter current password">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="newpassword" placeholder="Enter new password">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="confirmpassword" placeholder="Enter new password again">
              </div>
              <button type="submit" class="btn btn-primary mt-3">Change</button>
          </form>
      </div>
  </div>
</div>





@endsection()