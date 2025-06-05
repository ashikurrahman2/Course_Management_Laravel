<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    // Toastr message calling
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    public function index()
    {
        $courses = Course::all();
          $abouts = About::all();
          $banners = Banner::all();
         $categories = Category::all();
         return view('frontend.pages.index', compact('courses', 'abouts', 'categories', 'banners'));
  
    }

     public function allCourse(){
           $courses = Course::latest()->paginate(10);
         //   $categories = Category::all();
           $categories = Category::withCount('courses')->get();
        return view('frontend.pages.courses', compact('courses','categories'));
     }

    //  Course Details
          public function details($id)
     {
        $course = Course::findOrFail($id);
        return view('frontend.pages.course_details', compact('course'));
     }

       public function ListCourse(){
        $courses = Course::paginate(8);
        return view('frontend.pages.course_list', compact('courses'));
     }

public function filterCourses(Request $request)
{
    $categoryIds = $request->input('categories', []);

    $courses = Course::when($categoryIds, function($query) use ($categoryIds) {
        $query->whereIn('cat_id', $categoryIds); // ✅ ঠিক করে দেওয়া হয়েছে
    })->get();

    return response()->json($courses);
}



}
