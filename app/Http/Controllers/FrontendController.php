<?php

namespace App\Http\Controllers;

// use App\Models\Property;
// use App\Models\Rent;
use App\Models\About;
// use App\Models\Land;
// use App\Models\setting;
// use App\Models\Agent;
// use App\Models\Sell;
use App\Models\Banner;
use App\Models\Course;
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
        return view('frontend.pages.index', compact('courses', 'abouts', 'banners'));   
    }


    public function CourseDetail(){
  
        return view('frontend.pages.course_details');
    }

    public function About()
    {
        $abouts = About::all(); 
        return view('frontend.pages.about', compact('abouts'));
    }

     public function allCourse(){
        $courses = Course::paginate(10);
        return view('frontend.pages.courses', compact('courses'));
     }

    public function details($id)
    {
        $course = Course::findOrFail($id);
        return view('frontend.pages.courses', compact('course'));
    }


    public function Communication(){
        $abouts = About::get();
        return view('frontend.pages.contact',compact('abouts'));
    }

}
