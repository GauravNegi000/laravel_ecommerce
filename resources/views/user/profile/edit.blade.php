@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <form method="POST" action="{{ route('profile.update', ['userDetail' => $userDetail->id]) }}">
        @csrf
        @method('PUT')
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ $userDetail->first_name }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ $userDetail->last_name }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="gender">Gender</label>
                    <select class="custom-select @error('gender') is-invalid @enderror" name="gender" id="gender" value="">
                    @if ($userDetail->gender === 1)
                       @php  $gender = 'Male'; @endphp
                    @else 
                        @if ($userDetail->gender === 2)
                            @php $gender = 'Female'; @endphp
                        @else
                            @php $gender = 'Other'; @endphp
                        @endif
                    @endif
                        <option selected  value="{{ $userDetail->gender }}">{{ $gender }}</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="dob">Date of Birth</label>
                    <input id="dob" name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{ $userDetail->dob }}">
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary form-control" type="submit">Update Profile</button>
        </form>
        <hr>
        <div class="d-flex justify-content-center mb-2">
            <img id="image" src="{{ $userDetail->profile_image ? asset('images/'.$userDetail->profile_image) 
            : 'https://dummyimage.com/200x200/000/fff.png' }}" class="img-thumbnail img-fluid overflow-hidden">             
        </div>
        <form action="{{ route('profile.updateImage', ['userDetail' => $userDetail->id]) }}" method="POST" enctype="multipart/form-data" id="imageUploadForm">
            @csrf
            @method('PUT')
            <div class="custom-file">
                <input type="file" class="custom-file-input  @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image">
                <label class="custom-file-label" for="profile_image" id="profileImageLabel">Choose Image</label>
                @error('profile_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center mt-2">
                <input id="imageSubmit" type="submit" name="uploadImage" class="btn btn-primary" value="Change Your Profile Image">
            </div>
        </form>
        @if($userDetail->profile_image)
        <form action="{{ route('profile.removeImage', ['userDetail' => $userDetail->id]) }}" method="POST"> 
            @csrf
            @method('DELETE')
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" name="deleteImage" class="btn btn-danger float-left" value="Delete Your Profile Image">
            </div>
        </form>
        @endif
    </div>
</div>
@endsection

