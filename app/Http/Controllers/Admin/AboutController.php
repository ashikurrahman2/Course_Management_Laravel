<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AboutController extends Controller
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
            $about = About::all();
            return DataTables::of($about)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo) {
                        return '<img src="' . asset($row->photo) . '" alt="Photo" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No photo uploaded';
                    }
                })
                ->addColumn('signature', function ($row) {
                    if ($row->signature) {
                        return '<img src="' . asset($row->signature) . '" alt="Signature" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No signature uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('about.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['photo', 'signature', 'action'])
                ->make(true);
        }
        return view('admin.pages.about.index');
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
            'title'       => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'signature'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

            //  Remove HTML tag
            $request->merge([
                'description' => strip_tags($request->description),
            ]);
        About::newAbout($request);
        $this->toastr->success('About created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        // Check if a new photo file is uploaded
if ($request->hasFile('photo')) {
    // Delete the old photo if exists
    if ($about->photo && file_exists(public_path($about->photo))) {
        unlink(public_path($about->photo));
    }

    // Upload the new photo
    $photo = $request->file('photo');
    $photoName = time() . '_photo.' . $photo->getClientOriginalExtension();
    $photoPath = 'uploads/about/photos/';
    $photo->move(public_path($photoPath), $photoName);

    // Update the photo path
    $about->photo = $photoPath . $photoName;
}

// Check if a new signature file is uploaded
if ($request->hasFile('signature')) {
    // Delete the old signature if exists
    if ($about->signature && file_exists(public_path($about->signature))) {
        unlink(public_path($about->signature));
    }

    // Upload the new signature
    $signature = $request->file('signature');
    $signatureName = time() . '_signature.' . $signature->getClientOriginalExtension();
    $signaturePath = 'uploads/about/signatures/';
    $signature->move(public_path($signaturePath), $signatureName);

    // Update the signature path
    $about->signature = $signaturePath . $signatureName;
}

      // Update the rest of the fields
      $property->update([
        'title' => $validated['title'],
        'photo' => $validated['photo'],
        'signature' => $validated['signature'],
        'description' => $validated['description'],
    ]);

    $this->toastr->Success('About updated successfully!');

    // Redirect back to the index page
    return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
    
        $this->toastr->success('About Deleted successfully!');
        return back();
    }
}
