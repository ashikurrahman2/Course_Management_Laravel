<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
      
        $this->toastr = $toastr;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Get the logged-in user
        return view('user.student_profile', compact('user'));
    }

    public function enroll()
    {
        return view('user.course_enroll');
    }

    public function Wishlist()
    {
        return view('user.student_whislist');
    }

    public function Review()
    {
        return view('user.student_reviews');
    }

    public function Anounce()
    {
        return view('user.anouncement');
    }

    public function Orderlist()
    {
        return view('user.student_order');
    }

    public function Usetting()
    {
        $user = auth()->user();
        return view('user.student_settings', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => 'nullable|string|max:20',
            'skill' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:600',
        ]);

        // Update user profile
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'skill' => $request->skill,
            'bio' => $request->bio,
        ]);

        $this->toastr->success('Profile updated successfully.');
        return back();
    }
    // Password update
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $user = auth()->user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

    // Update new password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
         
        $this->toastr->success('Password updated successfully');
        return back();
    }

}
