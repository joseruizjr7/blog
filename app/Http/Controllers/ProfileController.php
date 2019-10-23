<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('auth.profile', [
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Form Validation
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get current user
        $user = Auth::user();

        // Set user name
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');

        // check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/storage/images/profile-images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }

        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }
}
