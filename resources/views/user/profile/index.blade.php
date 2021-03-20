@extends('layouts.app')
@include('partials.side-navbar')
@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row justify-content-center">
            <div class="position-relative">
                <img class="img-fluid " src="https://dummyimage.com/1400x300/000/fff.png" alt="Card image cap">
            </div>
            <div class="mt-3 position-absolute">
                <img id="image" src="{{ $userDetail->profile_image ? asset('images/'.$userDetail->profile_image) 
                : 'https://dummyimage.com/200x200/000/fff.png' }}" class="img-thumbnail img-fluid overflow-hidden">             
            </div>
    </div>
    <div class="jumbotron mt-3 ">
        <div class="card-body">
            <h5>Hi, {{ $userDetail->first_name }} {{ $userDetail->last_name }}</h5>
            <p>Welcome to your profile page.</p>
            <p><small class="text-muted">You Last updated your profile {{ $userDetail->updated_at }}</small></p>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <a class="btn btn-warning" href="{{ route('profile.edit', ['userDetail' => $userDetail->id]) }}">Edit Your profile</a>
    </div>
</div>
@endsection
