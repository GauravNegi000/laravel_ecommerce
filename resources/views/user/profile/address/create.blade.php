@extends('layouts.app')
@include('partials.side-navbar')
@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="justify-content-center">
        <form method="POST" action="{{ route('address.store') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="first_name">Address Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-9 mb-3">
                    <label for="last_name">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">
                    @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{ old('mobile') }}">
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="landmark">Landmark</label>
                    <input type="text" class="form-control @error('landmark') is-invalid @enderror" name="landmark" id="landmark" value="{{ old('landmark') }}">
                    @error('landmark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                        <option value="" disabled selected>Select country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city">City</label>
                    <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                        <option value="" disabled selected>Select city</option>
                    </select>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <button class="btn btn-primary form-control">Add New Address</button>
            </div>
        </form>
    </div>
</div>
@endsection
