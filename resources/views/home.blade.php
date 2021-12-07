@extends('layouts.master')
 
@section('content')

<<div class="container">
    
    @if(session()->has('user'))
            <h3>
                Hello {{session()->get('user')}} Welcome.
            </h3>
    @endif
</div>




@endsection()