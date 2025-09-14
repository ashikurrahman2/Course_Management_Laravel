<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Admissionrequirement;
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

    // 🔹 সব কোর্স + filter
    public function index()
    {
        $abouts     = About::all();
        $banners    = Banner::all();
        $categories = Category::all();
         $courses  = Course::all();

        // category slug filter
        // if ($request->has('category')) {
        //     $slug     = $request->category;
        //     $category = Category::where('category_slug', $slug)->firstOrFail();
        //     $courses  = Course::where('category_id', $category->id)->paginate(6);
        // } else {
        //     $courses  = Course::paginate(6);
        // }

        return view('frontend.pages.index', compact('courses', 'abouts', 'banners', 'categories'));
    }

    // 🔹 নির্দিষ্ট category এর কোর্স
    // public function categoryCourses($slug)
    // {
    //     $categories = Category::all();
    //     $category   = Category::where('category_slug', $slug)->firstOrFail();
    //     $courses    = Course::where('category_id', $category->id)->paginate(6);

    //     return view('frontend.pages.courses', compact('courses', 'categories', 'category'));
    // }



  public function managementAbout(){
             $categories = Category::all();
             $abouts = About::all();
        return view('frontend.pages.about', compact('categories', 'abouts'));
     }

       public function Admissionreq(){
             $categories = Category::all();
           $requirements = Admissionrequirement::all();
        return view('frontend.pages.admission', compact('categories', 'requirements'));
     }

          public function Admitform(){
             $categories = Category::all();
           
        return view('frontend.pages.admission_form', compact('categories'));
     }

     public function allCourse(){
           $courses = Course::paginate(6);
           $categories = Category::all();
        //    $categories = Category::withCount('courses')->get();
        return view('frontend.pages.courses', compact('courses','categories'));
     }

    //  Course Details
          public function details($id)
     {
        $courses = Course::findOrFail($id);
           $categories = Category::all();
        return view('frontend.pages.course_details', compact('courses', 'categories'));
     }

       public function ListCourse(){
        $courses = Course::paginate(8);
        $categories = Category::all();
        return view('frontend.pages.course_list', compact('courses', 'categories'));
     }

public function filterCourses(Request $request)
{
    $categoryIds = $request->input('categories', []);

    $courses = Course::when($categoryIds, function($query) use ($categoryIds) {
        $query->whereIn('cat_id', $categoryIds); // ✅ ঠিক করে দেওয়া হয়েছে
    })->get();

    return response()->json($courses);
}


public function LessonCourse(){

   $categories = Category::all();
  return view('frontend.pages.course_lesson', compact('categories'));
}


}
