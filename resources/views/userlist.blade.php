@extends('layouts.master')
 
@section('content')
        @if(session()->has('success'))
            <h3 class="text-success">
             {{session()->get('success')}}
            </h3>
        @endif
 
<table class="table table-striped w-50  mx-auto" >
    
    <h3 class="text-danger py-4 text-center">User Lists</h3>
   <tr>
       <th>ID</th>
       <th>Username</th>
       <th>Email</th>
       <th>Edit/Delete</th>
   </tr>
   @foreach ($users as $user )
       <tr> 
    <td> {{ $user->id }} </td>
    <td> {{ $user->username }} </td>
    <td> {{ $user->email }} </td>  
    <td> <div class="d-flex" >
        <a href="{{ route('editUser',$user->id) }}" class="px-3"> <i class="fas fa-user-edit"></i> </a>
        <a href="{{ route('deleteUser',$user->id) }}"> <i class="far fa-trash-alt"></i></a>
        </div> </td>
   </tr>
   @endforeach


</table>


@endsection()