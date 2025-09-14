<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admissionrequirement;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdmissionrequirementController extends Controller
{
    // Toastr message calling
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
            $requirements = Admissionrequirement::all();

            return DataTables::of($requirements)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-' . $row->id . '" action="' . route('admissionrequirement.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.admissionrequirement.index');
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
        // Validation
        $request->validate([
            'requirement_name' => 'required|string|max:255',
        ]);

        // Save to DB
        Admissionrequirement::newRequirement($request);

        $this->toastr->success('Admission Requirement created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Admissionrequirement $admissionrequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requirement = Admissionrequirement::findOrFail($id);
        return view('admin.pages.admissionrequirement.edit', compact('requirement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'requirement_name' => 'required|string|max:255',
        ]);

        // Update in DB
        Admissionrequirement::updateRequirement($request, $id);

        $this->toastr->success('Admission Requirement updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requirement = Admissionrequirement::findOrFail($id);
        Admissionrequirement::deleteRequirement($requirement);

        $this->toastr->success('Admission Requirement deleted successfully!');
        return back();
    }
}
