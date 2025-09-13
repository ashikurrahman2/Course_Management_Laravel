<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseDetail;
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
     * Display a listing of course details.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courseDetails = CourseDetail::all();

            return DataTables::of($courseDetails)
                ->addIndexColumn()
                ->addColumn('course_teacherphoto', function ($row) {
                    if ($row->course_teacherphoto) {
                        return '<img src="' . asset($row->course_teacherphoto) . '" style="max-width:40px;border-radius:50%;">';
                    } else {
                        return 'No photo';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">
                            <i class="fa fa-trash"></i>
                        </button>
                        <form id="delete-form-'.$row->id.'" action="'.route('details.destroy', $row->id).'" method="POST" style="display:none;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                        </form>';
                    return $btn;
                })
                ->rawColumns(['course_teacherphoto','action'])
                ->make(true);
        }

        return view('admin.pages.coursedetails.index');
    }

    /**
     * Store a newly created course detail.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_overview'        => 'nullable|string|max:255',
            'course_content'         => 'nullable|string',
            'course_subcontent'      => 'nullable|string|max:255',
            'course_teacherphoto'    => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'course_teacherintro'    => 'nullable|string|max:255',
            'course_teacherdesignation' => 'nullable|string|max:255',
            'pass_parcentage'        => 'nullable|string|max:255',
            'course_level'           => 'nullable|string|max:255',
        ]);

            //  Remove HTML tag
            $request->merge([
            'course_overview'    => strip_tags($request->course_overview),
            'course_teacherintro'=> strip_tags($request->course_teacherintro),

            ]);

        CourseDetail::newCourseDetail($request);
        $this->toastr->success('Course Detail created successfully!');
        return back();
    }

    /**
     * Show the form for editing a course detail.
     */
    public function edit($id)
    {
        $courseDetail = CourseDetail::findOrFail($id);
        return view('admin.pages.coursedetails.edit', compact('courseDetail'));
    }

    /**
     * Update a course detail.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_overview'        => 'nullable|string|max:255',
            'course_content'         => 'nullable|string',
            'course_subcontent'      => 'nullable|string|max:255',
            'course_teacherphoto'    => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'course_teacherintro'    => 'nullable|string|max:255',
            'course_teacherdesignation' => 'nullable|string|max:255',
            'pass_parcentage'        => 'nullable|string|max:255',
            'course_level'           => 'nullable|string|max:255',
        ]);

        CourseDetail::updateCourseDetail($request, $id);
        $this->toastr->success('Course Detail updated successfully!');
        return back();
    }

    /**
     * Delete a course detail.
     */
    public function destroy($id)
    {
        $courseDetail = CourseDetail::findOrFail($id);
        CourseDetail::deleteCourseDetail($courseDetail);
        $this->toastr->success('Course Detail deleted successfully!');
        return back();
    }
}
