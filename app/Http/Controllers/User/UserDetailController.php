<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetail;
use App\Http\Requests\UserDetailUpdateRequest;
use App\Http\Requests\UserImageUpdateRequest;

class UserDetailController extends Controller
{
    // function to show profile page
    public function index()
    {
        $user = Auth::user();
        $userDetail = $user->userDetail;
        return view('user/profile/index', compact('userDetail'));        
    }

    // function to show profile edit page
    public function edit(Request $request, UserDetail $userDetail)
    {
        return view('user/profile/edit', compact('userDetail'));        
    }

    // funciton to handle update user details
    public function update(UserDetailUpdateRequest $request, UserDetail $userDetail)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->update([
            'name' => $request->get('first_name') . ' ' . $request->get('last_name'),
        ]);
        $userDetail->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'dob' => $request->get('dob'),
            'gender' => $request->get('gender'),
        ]);
        return redirect()->route('profile.index')->with('message', 'Successfully Updated your profile');
    }

    // function to update profile image of user
    public function updateImage(UserImageUpdateRequest $request, UserDetail $userDetail)
    {
        $validated = $request->validated();

        $image_name = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $image_name);

        $userDetail->update([
            'profile_image' => $image_name,
        ]);
        return redirect()->route('profile.index')->with('message', 'Successfully Updated your profile Image');
    }
    
    // function to remove profile image of user
    public function removeImage(Request $request, UserDetail $userDetail)
    {
        $userDetail->update([
            'profile_image' => NULL,
        ]);
        return redirect()->route('profile.index')->with('message', 'Successfully Removed your profile Image');
    }
}
