<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admissionguide;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdmissionguideController extends Controller
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
            $guides = Admissionguide::all();

            return DataTables::of($guides)
                ->addIndexColumn()
                ->addColumn('guide_image', function ($row) {
                    if ($row->guide_image) {
                        return '<img src="' . asset($row->guide_image) . '" alt="guide image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No image uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('admissionguides.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['guide_image', 'action'])
                ->make(true);
        }

        return view('admin.pages.admissionguides.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'guide_title'       => 'required|string|max:500',
            'guide_content'     => 'required|string',
            'guide_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'close_admission'   => 'nullable|date|max:255',
            'session'           => 'nullable|string|max:255',
            'closing_content'   => 'nullable|string',
        ]);

              //  Remove HTML tag
            $request->merge([
            'guide_content'    => strip_tags($request->guide_content),
            'closing_content'=> strip_tags($request->closing_content),

            ]);

        Admissionguide::newGuide($request);
        $this->toastr->success('Admission Guide created successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guide = Admissionguide::findOrFail($id);
        return view('admin.pages.admissionguides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'guide_title'       => 'required|string|max:500',
            'guide_content'     => 'required|string',
            'guide_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'close_admission'   => 'nullable|string|max:255',
            'session'           => 'nullable|string|max:255',
            'closing_content'   => 'nullable|string',
        ]);

        Admissionguide::updateGuide($request, $id);
        $this->toastr->success('Admission Guide updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guide = Admissionguide::findOrFail($id);
        Admissionguide::deleteGuide($guide);
        $this->toastr->success('Admission Guide deleted successfully!');
        return back();
    }
}
