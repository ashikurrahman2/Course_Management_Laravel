<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str; 
use App\Models\InstractorDetail;
use App\Models\Instractor;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InstructorDetailController extends Controller
{
    // Toastr massage calling
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
        $details = InstractorDetail::with('instructor')->latest()->get();

        return DataTables::of($details)
            ->addIndexColumn()
            ->addColumn('instructor', function ($row) {
                return $row->instructor ? $row->instructor->instructor_name : 'N/A';
            })
            ->editColumn('about_me', fn($row) => Str::limit($row->about_me, 50))
            ->editColumn('facebook', fn($row) => $row->facebook ?? '-')
            ->editColumn('linkedin', fn($row) => $row->linkedin ?? '-')
            ->editColumn('twitter', fn($row) => $row->twitter ?? '-')
            ->addColumn('action', function ($row) {
                return '
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" 
                        data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-'.$row->id.'" 
                        action="'.route('instructor-details.destroy',$row->id).'" 
                        method="POST" style="display:none;">
                        '.csrf_field().method_field('DELETE').'
                    </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // এখানে instructors ও পাঠাতে হবে
    $instructors = Instractor::all();
    return view('admin.pages.instructor_details.index', compact('instructors'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instructor_id' => 'required|exists:instractors,id',
            'about_me'      => 'required|string',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string',
            'facebook'      => 'nullable|url',
            'linkedin'      => 'nullable|url',
            'twitter'       => 'nullable|url',
        ]);

        InstractorDetail::newDetail($request);

        $this->toastr->success('Instructor Detail created successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detail = InstractorDetail::findOrFail($id);
        $instructors = Instractor::all();
        return view('admin.pages.instructor_details.edit', compact('detail', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'instructor_id' => 'required|exists:instractors,id',
            'about_me'      => 'required|string',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string',
            'facebook'      => 'nullable|url',
            'linkedin'      => 'nullable|url',
            'twitter'       => 'nullable|url',
        ]);

        InstractorDetail::updateDetail($request, $id);

        $this->toastr->success('Instructor Detail updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = InstractorDetail::findOrFail($id);
        InstractorDetail::deleteDetail($detail);

        $this->toastr->success('Instructor Detail deleted successfully!');
        return back();
    }
}
