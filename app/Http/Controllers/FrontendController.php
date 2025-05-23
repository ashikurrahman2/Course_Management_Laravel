<?php

namespace App\Http\Controllers;

use App\Models\About;
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


     public function allCourse(){
        $courses = Course::paginate(10);
        return view('frontend.pages.courses', compact('courses'));
     }

       public function ListCourse(){
        $courses = Course::paginate(8);
        return view('frontend.pages.course_list', compact('courses'));
     }

    public function details($id)
    {
        $course = Course::findOrFail($id);
        return view('frontend.pages.courses', compact('course'));
    }

}
