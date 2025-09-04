<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\coursedetail;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseDetailController extends Controller
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
        $courses_details = coursedetail::all();

        return DataTables::of($courses_details)
            ->addIndexColumn() 
            ->addColumn('course_teacherphoto', function ($row) {
                if ($row->course_teacherphoto) {
                    return '<img src="' . asset($row->course_teacherphoto) . '" alt="news image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                              <form id="delete-form-' . $row->id . '" action="' . route('details.destroy', $row->id) . '" method="POST" style="display: none;">
                                  ' . csrf_field() . '
                                  ' . method_field('DELETE') . '
                              </form>';
                return $actionbtn;
            })
            ->rawColumns(['course_teacherphoto', 'action'])
            ->make(true);
    }

    return view('admin.pages.coursedetails.index');
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
        // Validation check
        $request->validate([
            'course_overview'           => 'required|string|max:500',
            'course_content'            => 'required|string|max:500',
            'course_subcontent'         => 'required|string|max:500',
            'course_teacherintro'       => 'required|string|max:500',
            'course_teacherdesignation' => 'required|string|max:500',
            'pass_parcentage'           => 'required|integer|max:255',
            'course_level'              => 'required|string|max:255',
            'course_teacherphoto'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Remove HTML tags from specific fields
        $request->merge([
            'course_overview'    => strip_tags($request->course_overview),
            'course_teacherintro'=> strip_tags($request->course_teacherintro),
        ]);

        // Save to database
        coursedetail::newCourseDetail($request);

        $this->toastr->success('Course Details created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(coursedetail $courses_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          $courses_details = coursedetail::findOrFail($id);
        return view('admin.pages.coursedetails.edit', compact('courses_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
              // Update Validation check
        $request->validate([
            'course_overview'                   => 'required|string|max:500',
            'course_content'                    => 'required|string|max:500',
            'course_subcontent'                 => 'required|string|max:500',
            'course_teacherintro'               => 'required|string|max:500',
            'course_teacherdesignation'         => 'required|string|max:500',
            'pass_parcentage'                   => 'required|integer|max:255',
            'course_level'                      => 'required|string|max:255',
            'course_teacherphoto'               => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

          // Fetch Data 
        coursedetail::updateCourseDetail($request, $id);
        // Success Message
        $this->toastr->success('Course Details updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courses_details = coursedetail::findOrFail($id);
        $courses_details->delete();
        $this->toastr->success('Course Details Deleted successfully!');
        return back();
    }
}
