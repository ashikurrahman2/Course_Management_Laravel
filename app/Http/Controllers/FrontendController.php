<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Admissionrequirement;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Admissiondata;
use App\Models\Course;
use App\Models\Instractor;
use App\Models\InstractorDetail;
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

          public function AdmissionForm(){
             $categories = Category::all();
        return view('frontend.pages.admission_form', compact('categories'));
     }
            // Admission form submission
             public function Submitform(Request $request){
                 // Validation
        $request->validate([
            'stu_name'     => 'required|string|max:255',
            'stu_email'    => 'required|email|string|max:255',
            'stu_phone'    => 'required|string|max:20',
            'stu_gender'   => 'required|string',
            'stu_course'   => 'required|string',
            'stu_address'  => 'required|string',
            'stu_division' => 'required|string',
            'payment_method' => 'required|string',
            'payment_number' => 'required|string',
            'stu_distict'  => 'required|string',
            'stu_photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

          // Save assignment
        Admissiondata::newAdmission($request);
       // Response / redirect
        $this->toastr->success('Admission data submitted successfully!');
         return back();
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


    public function Commu(){

      $categories = Category::all();
      return view('frontend.pages.contact', compact('categories'));
    }

    public function Cartto($id){

      $categories = Category::all();
      $courses = Course::findOrFail($id);
      return view('frontend.pages.checkout', compact('categories', 'courses'));
    }
      // Instructor  
        public function Itructor(){
        $categories = Category::all();
        $instractor = Instractor::all();
      return view('frontend.pages.instructor', compact('categories', 'instractor'));
    }
public function ItructorDetail($id)  // $id এখানে থাকতে হবে
{
    $categories = Category::all();

    // Instractor কে details সহ লোড করা
    $instructor = Instractor::with('details')->find($id);

    // যদি instructor না থাকে
    if (!$instructor) {
        abort(404, 'Instructor not found');
    }

    return view('frontend.pages.instructor_details', compact('categories', 'instructor'));
}

public function frontFaq()
{
    $categories = Category::all();
    $faqs = Faq::all(); 
    return view('frontend.pages.faq', compact('faqs', 'categories'));
}

   // Registration form
    // public function showRegisterForm()
    // {
    //       $categories = Category::all();
    //     return view('auth.instructor_register', compact('categories'));
    // }


}
