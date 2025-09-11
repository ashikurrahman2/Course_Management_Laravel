<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Assignmentdetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
           $categories = Category::all();
        return view('user.student_profile', compact('user','categories'));
    }

    public function enroll()
    {
            $categories = Category::all();
        return view('user.course_enroll', compact('categories'));
    }

    public function Wishlist()
    {
          $categories = Category::all();
        return view('user.student_whislist', compact('categories'));
    }

    public function Review()
    {
         $categories = Category::all();
        return view('user.student_reviews', compact('categories'));
    }

    public function Anounce()
    {
         $categories = Category::all();
        return view('user.anouncement', compact('categories'));
    }

    // Assignment
    public function Work(){

      // Retrive Course namefrom database to do distinct 
          $courses = Assignment::select('exp_name')->distinct()->get();
          $experiments = Assignment::select('course_name')->distinct()->get();
          $assignments = Assignment::all();
           $categories = Category::all();
        return view('user.assignment', compact('assignments','courses','experiments','categories'));
    }

       public function store(Request $request)
    {
       // Validation
        $request->validate([
            'name'            => 'required|string|max:255',
            'course_name'        => 'required|string|max:255',
            // 'user_id'         => 'required|integer',
            'submission_date' => 'required|string', // আসবে modal থেকে (Sep 11, 2025 - 12:49 PM)
            'assignment_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:2048',
        ]);

   // Save assignment
        Assignmentdetails::newAssignment($request);

        // Response / redirect
        $this->toastr->success('Assignment submitted successfully!');

        return back();
    }

    public function Orderlist()
    {
          $categories = Category::all();
        return view('user.student_order', compact('categories'));
    }

    public function Usetting()
    {
        $user = auth()->user();
             $categories = Category::all();
        return view('user.student_settings', compact('user', 'categories'));
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
