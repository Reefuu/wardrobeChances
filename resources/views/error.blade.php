@extends('layouts.app')

@section('container')
    
    <div class="text-center">
        <img src="{{ asset('pictures/nopermission.svg') }}" class="card-img-top " style="width: 300px; height: 300px"
            alt="No Permission">
    </div>

    <h5 class="text-center">Sorry, but you don't have permission to view this page</h5>
    <p class="text-center mb-4">You need to login first!</p>
@endsection
