<?php

namespace App\Http\Controllers;

// use App\Models\Property;
// use App\Models\Rent;
// use App\Models\About;
// use App\Models\Land;
// use App\Models\setting;
// use App\Models\Agent;
// use App\Models\Sell;
// use App\Models\Partner;
// use App\Models\News;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{

    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    public function index()
    {
        // $properties = Property::all();
        // $abouts = About::get();
        // $newses = News::all();
        // $agents = Agent::all();
        // $settings = setting::get();
        // $partners = Partner::paginate(10);
        // $rents = Rent::all();
        return view('frontend.pages.index');   
    }


    public function CourseDetail(){
  
        return view('frontend.pages.course_details');
    }

    public function About()
    {
        $abouts = About::get(); // Retrieve the first record
        return view('frontend.pages.about', compact('abouts'));
    }

     public function allCourse(){

        return view('frontend.pages.courses');
     }

    public function Communication(){
        $abouts = About::get();
        return view('frontend.pages.contact',compact('abouts'));
    }

    public function partnerDetails(){
        $partners=Partner::all();
        $abouts = About::get();
        return view('frontend.pages.partner_collabration', compact('partners', 'abouts'));
    }

    public function Career(){
        $abouts = About::get();
        $lands = Land::all();
        return view('frontend.pages.career_form', compact('abouts','lands'));
    }

    public function JobApplication(){
        $abouts = About::get();
        return view('frontend.pages.job_application', compact('abouts'));
    }

    public function Rent(){
        $abouts = About::get();
        return view('frontend.pages.rent_property', compact('abouts'));
    }

    public function rentDetails($id)
    {
        $rent = Rent::findOrFail($id); 
        $abouts = About::all();
        return view('frontend.pages.rent_details', compact('rent', 'abouts'));
    }


    public function applySell(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zilla' => 'required|string|max:255',
            'bds' => 'required|string|max:255',
            'qnty' => 'required|string',
            'morrja' => 'required|string',
            'category' => 'nullable|string|max:50',
            'road' => 'required|string|max:255',
            'price' => 'required|string',
            'bayna' => 'required|numeric',    
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
      

        Sell::newSell($request);
        $this->toastr->success('Your application has been successful.');
        return back();
    }

}
