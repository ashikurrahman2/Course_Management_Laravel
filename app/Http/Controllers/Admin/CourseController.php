<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{

    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $course = Course::all();
            return DataTables::of($course)
                ->addIndexColumn() 
                ->addColumn('course_image', function ($row) {
                    if ($row->course_image) {
                        return '<img src="' . asset($row->course_image) . '" alt="news image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No logo uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                    <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                <form id="delete-form-' . $row->id . '" action="' . route('courses.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['course_image', 'action'])
                ->make(true);
        }
        return view('admin.pages.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'course_title' => 'required|string|max:500',
            'course_category' => 'required|string|max:500',
            'course_price' => 'required|string|max:500',
            'course_teacher' => 'required|string|max:500',
            'course_lavel' => 'required|string|max:500',
            'course_duration' => 'required|string|max:500',
            'course_learn' => 'required|string|max:500',
            'course_content_title' => 'required|string|max:500',
            'course_content_answer' => 'required|string|max:500',
            'course_content_requirement' => 'required|string|max:500',
            'course_audience' => 'required|string|max:500',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
          //  Remove HTML tag
          $request->merge([
            'course_learn'                  => strip_tags($request->course_learn),
            'course_content_answer'         => strip_tags($request->course_content_answer),
            'course_content_requirement'    => strip_tags($request->course_content_requirement),
            'course_audience'               => strip_tags($request->course_audience),
        ]);

        // Fetch data from database 
         Course::newCourse($request);
         $this->toastr->success('Course created successfully!');
         return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.pages.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
            // Validate the incoming request
            $validated = $request->validate([
                'course_title' => 'required|string|max:500',
                'course_category' => 'required|string|max:500',
                'course_price' => 'required|string|max:500',
                'course_teacher' => 'required|string|max:500',
                'course_lavel' => 'required|string|max:500',
                'course_duration' => 'required|string|max:500',
                'course_learn' => 'required|string|max:500',
                'course_content_title' => 'required|string|max:500',
                'course_content_answer' => 'required|string|max:500',
                'course_content_requirement' => 'required|string|max:500',
                'course_audience' => 'required|string|max:500',
                'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

                 // Check if a new image file is uploaded
        if ($request->hasFile('course_image')) {
            // Delete the old image if exists
            if ($course->course_image && file_exists(public_path($course->course_image))) {
                unlink(public_path($course->course_image));
            }

            // Upload the new image
            $image = $request->file('course_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/courses/';
            $image->move(public_path($imagePath), $imageName);

            // Update the image path
            $course->course_image = $imagePath . $imageName;
        }

        
        // Update the rest of the fields
        $course->update([
            'course_title'                          => $validated['course_title'],
            'course_category'                       => $validated['course_category'],
            'course_price'                          => $validated['course_price'],
            'course_teacher'                        => $validated['course_teacher'],
            'course_image'                          => $validated['course_image'],
            'course_lavel'                          => $validated['course_lavel'],
            'course_duration'                       => $validated['course_duration'],
            'course_learn'                          => $validated['course_learn'],
            'course_content_title'                  => $validated['course_content_title'],
            'course_content_answer'                 => $validated['course_content_answer'],
            'course_content_requirement'            => $validated['course_content_requirement'],
            'course_audience'                       => $validated['course_audience'],
        ]);

        // Success Message
        $this->toastr->success('Course updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        $this->toastr->success('Course Deleted successfully!');
        return back();
    }
}
