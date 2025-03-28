<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PropertyController extends Controller
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
            $property = Property::all();
            return DataTables::of($property)
                ->addIndexColumn() 
                ->addColumn('property_image', function ($row) {
                    if ($row->property_image) {
                        return '<img src="' . asset($row->property_image) . '" alt="property image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                <form id="delete-form-' . $row->id . '" action="' . route('property.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['property_image', 'action'])
                ->make(true);
        }
        return view('admin.pages.property.index');
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
    public function store(Request $request, ToastrInterface $flasher)
    {
        $request->validate([

            'property_title' => 'required|string|max:500',
            'property_description' => 'required|string|max:500',
            'property_address' => 'required|string|max:500',
            'property_elements' => 'required|string|max:500',
            'property_bath' => 'required|numeric|max:500',
            'property_sqrt' => 'required|string|max:500',
            'property_action' => 'required|string|max:255',
            'property_amount' => 'required|string|max:255',
            'property_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

           //  Remove HTML tag
           $request->merge([
            'property_description' => strip_tags($request->property_description),
        ]);
        
        Property::newProperty($request);
        // $this->toastr->success('Property info Inserted successfully!');
        $this->toastr->success('Property created successfully!');

           // Flash a success message
    // $flasher->addSuccess('Property info inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.pages.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property, ToastrInterface $flasher)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'property_title' => 'required|string|max:500',
            'property_description' => 'required|string|max:500',
            'property_address' => 'required|string|max:500',
            'property_elements' => 'required|string|max:500',
            'property_bath' => 'required|numeric|max:500',
            'property_sqrt' => 'required|string|max:500',
            'property_action' => 'required|string|max:255',
            'property_amount' => 'required|string|max:255',
            'property_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image file is uploaded
        if ($request->hasFile('property_image')) {
            // Delete the old image if exists
            if ($property->property_image && file_exists(public_path($property->property_image))) {
                unlink(public_path($property->property_image));
            }

            // Upload the new image
            $image = $request->file('property_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/property/';
            $image->move(public_path($imagePath), $imageName);

            // Update the image path
            $property->property_image = $imagePath . $imageName;
        }

        // Update the rest of the fields
        $property->update([
            'property_title' => $validated['property_title'],
            'property_description' => $validated['property_description'],
            'property_address' => $validated['property_address'],
            'property_elements' => $validated['property_elements'],
            'property_bath' => $validated['property_bath'],
            'property_sqrt' => $validated['property_sqrt'],
            'property_action' => $validated['property_action'],
            'property_amount' => $validated['property_amount'],
        ]);

        // Success message
    $this->toastr->success('Property updated successfully!');

        // Redirect back to the index page
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        $this->toastr->success('Property Deleted successfully!');
        return back();
    }
}
