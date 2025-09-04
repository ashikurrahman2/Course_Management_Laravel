<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AssignmentController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    /**
     * Display a listing of assignments.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assignments = Assignment::all();

            return DataTables::of($assignments)
                ->addIndexColumn()
                ->addColumn('assignment_file', function ($row) {
                    if ($row->assignment_file) {
                        $ext = pathinfo($row->assignment_file, PATHINFO_EXTENSION);
                        if (in_array(strtolower($ext), ['jpg','jpeg','png','webp'])) {
                            return '<img src="' . asset($row->assignment_file) . '" style="max-width:40px;">';
                        } elseif(strtolower($ext) === 'pdf') {
                            return '<a href="' . asset($row->assignment_file) . '" target="_blank" class="btn btn-sm btn-secondary">View PDF</a>';
                        } else {
                            return 'File uploaded';
                        }
                    } else {
                        return 'No file uploaded';
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'pending') {
                        return '<span class="badge bg-warning">Pending</span>';
                    } elseif($row->status == 'approved') {
                        return '<span class="badge bg-success">Approved</span>';
                    } else {
                        return '<span class="badge bg-danger">Denied</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('assignments.approve', $row->id).'" class="btn btn-success btn-sm me-1">Approve</a>
                            <a href="'.route('assignments.deny', $row->id).'" class="btn btn-danger btn-sm me-1">Deny</a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>
                            <form id="delete-form-'.$row->id.'" action="'.route('assignments.destroy', $row->id).'" method="POST" style="display:none;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                            </form>';
                    return $btn;
                })
                ->rawColumns(['assignment_file','status','action'])
                ->make(true);
        }

        return view('admin.pages.assignments.index');
    }

    /**
     * Store a newly created assignment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:500',
            'total_marks' => 'required|integer',
            'deadline' => 'nullable|string|max:255',
            'assigned_date' => 'required|date',
            'assignment_file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        ]);

        Assignment::newAssignment($request);
        $this->toastr->success('Assignment created successfully!');
        return back();
    }

    /**
     * Show the form for editing an assignment.
     */
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('admin.pages.assignments.edit', compact('assignment'));
    }

    /**
     * Update an assignment.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:500',
            'total_marks' => 'required|integer',
            'deadline' => 'nullable|string|max:255',
            'assigned_date' => 'required|date',
            'assignment_file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        ]);

        Assignment::updateAssignment($request, $id);
        $this->toastr->success('Assignment updated successfully!');
        return back();
    }

    /**
     * Delete an assignment.
     */
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        Assignment::deleteAssignment($assignment);
        $this->toastr->success('Assignment deleted successfully!');
        return back();
    }

    /**
     * Approve an assignment.
     */
    public function approve($id)
    {
        Assignment::approveAssignment($id);
        $this->toastr->success('Assignment approved!');
        return back();
    }

    /**
     * Deny an assignment.
     */
    public function deny($id)
    {
        Assignment::denyAssignment($id);
        $this->toastr->success('Assignment denied!');
        return back();
    }
}
