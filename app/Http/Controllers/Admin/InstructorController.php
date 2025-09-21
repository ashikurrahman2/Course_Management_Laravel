<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instractor;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InstructorController extends Controller
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
            $instractors = Instractor::all();

            return DataTables::of($instractors)
                ->addIndexColumn()
                ->addColumn('instructor_image', function ($row) {
                    if ($row->instructor_image) {
                        return '<img src="' . asset($row->instructor_image) . '" alt="Instructor Image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No Image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('instructors.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['instructor_image', 'action'])
                ->make(true);
        }

        return view('admin.pages.instructors.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation check
        $request->validate([
            'instructor_name'        => 'required|string|max:255',
            'instructor_designation' => 'required|string|max:255',
            'instructor_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save data
        Instractor::newInstractor($request);

        $this->toastr->success('Instructor created successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instructor = Instractor::findOrFail($id);
        return view('admin.pages.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation check
        $request->validate([
            'instructor_name'        => 'required|string|max:255',
            'instructor_designation' => 'required|string|max:255',
            'instructor_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data
        Instractor::updateInstractor($request, $id);

        $this->toastr->success('Instructor updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instractor = Instractor::findOrFail($id);
        Instractor::deleteInstractor($instractor);

        $this->toastr->success('Instructor deleted successfully!');
        return back();
    }
}
