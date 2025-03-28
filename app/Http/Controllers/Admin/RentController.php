<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RentController extends Controller
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
            $rent = Rent::all();
            return DataTables::of($rent)
                ->addIndexColumn() 
                ->addColumn('rentproperty_image', function ($row) {
                    if ($row->rentproperty_image	) {
                        return '<img src="' . asset($row->rentproperty_image) . '" alt="rent image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                <form id="delete-form-' . $row->id . '" action="' . route('rent.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['rentproperty_image', 'action'])
                ->make(true);
        }
        return view('admin.pages.rent.index');
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

            'rentproperty_id' => 'required|string|max:500',
            'rentproperty_type' => 'required|string|max:500',
            'rent_sqrt' => 'required|string|max:500',
            'rent_title' => 'required|string|max:500',
            'rent_description' => 'required|string|max:500',
            'rentproperty_status' => 'required|string|max:500',
            'rent_rooms' => 'required|numeric|max:500',
            'rentproperty_price' => 'required|string|max:500',
            'bed_rooms' => 'required|numeric|max:255',
            'bath_rooms' => 'required|numeric|max:255',
            'garages' => 'required|numeric|max:255',
            'build_up' => 'required|string|max:255',
            'rentproperty_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

              //  Remove HTML tag
              $request->merge([
                'rent_description' => strip_tags($request->rent_description),
            ]);

            Rent::newRent($request);
            $this->toastr->success('Rent Property created successfully!');
            return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rent = Rent::findOrFail($id);
        return view('admin.pages.rent.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {
        $validated = $request->validate([
            'rentproperty_id' => 'required|string|max:500',
            'rentproperty_type' => 'required|string|max:500',
            'rent_sqrt' => 'required|string|max:500',
            'rent_title' => 'required|string|max:500',
            'rent_description' => 'required|string|max:500',
            'rentproperty_status' => 'required|string|max:500',
            'rent_rooms' => 'required|numeric|max:500',
            'rentproperty_price' => 'required|string|max:500',
            'bed_rooms' => 'required|numeric|max:255',
            'bath_rooms' => 'required|numeric|max:255',
            'garages' => 'required|numeric|max:255',
            'build_up' => 'required|string|max:255',
            'rentproperty_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if a new image file is uploaded
        if ($request->hasFile('rentproperty_image')) {
            // Delete the old image if exists
            if ($rent->rentproperty_image && file_exists(public_path($rent->rentproperty_image))) {
                unlink(public_path($rent->rentproperty_image));
            }
    
            // Upload the new image
            $image = $request->file('rentproperty_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/rent/';
            $image->move(public_path($imagePath), $imageName);
    
            // Update the image path
            $rent->rentproperty_image = $imagePath . $imageName;
        }
    
        // Update the rest of the fields
        $rent->update([
            'rentproperty_id' => $validated['rentproperty_id'],
            'rentproperty_type' => $validated['rentproperty_type'],
            'rent_title' => $validated['rent_title'],
            'rent_sqrt' => $validated['rent_sqrt'],
            'rent_description' => $validated['rent_description'],
            'rentproperty_status' => $validated['rentproperty_status'],
            'rent_rooms' => $validated['rent_rooms'],
            'rentproperty_price' => $validated['rentproperty_price'],
            'bed_rooms' => $validated['bed_rooms'],
            'bath_rooms' => $validated['bath_rooms'],
            'garages' => $validated['garages'],
            'build_up' => $validated['build_up'],
        ]);
    
        // Success message
        $this->toastr->success('Rent Property updated successfully!');
    
        // Redirect back to the index page
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rent = Rent::findOrFail($id);
        $rent->delete();
        $this->toastr->success('Rent Property Deleted successfully!');
        return back();
    }
}
