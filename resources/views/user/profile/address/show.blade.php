@extends('layouts.app')
@include('partials.side-navbar')
@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-100" style="max-width: 62.5rem;">
    <div class="card bg-light mb-3">
        <div class="card-header">{{ $address->name }} Address</div>
        <div class="card-body">
            <h5 class="card-title">{{ $address->city->country->name }}, {{ $address->city->name }}, {{ $address->address }}</h5>
            <h5 class="card-title">LandMark : {{ $address->landmark }}</h5>
            <h6 class="card-text">Mobile: {{ $address->mobile }}</h6>
            <p class="card-text">{{ $address->postal_code }}</p>
    </div>
</div>
@endsection
