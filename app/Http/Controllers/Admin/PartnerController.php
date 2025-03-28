<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
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
            $partner = Partner::all();
            return DataTables::of($partner)
                ->addIndexColumn() 
                ->addColumn('partner_logo', function ($row) {
                    if ($row->partner_logo) {
                        return '<img src="' . asset($row->partner_logo) . '" alt="oartner image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                <form id="delete-form-' . $row->id . '" action="' . route('partner.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['partner_logo', 'action'])
                ->make(true);
        }
        return view('admin.pages.partner.index');
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
            'partner_collaborations' => 'required|string|max:500',
            'partner_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

           //  Remove HTML tag
           $request->merge([
            'partner_collaborations' => strip_tags($request->partner_collaborations),
        ]);

        Partner::newPartner($request);
        $this->toastr->success('Partner created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.pages.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Partner $partner)
    {
        $request->validate([
            'partner_collaborations' => 'required|string|max:500',
            'partner_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         // Check if a new image file is uploaded
         if ($request->hasFile('partner_logo')) {
            // Delete the old image if exists
            if ($partner->partner_logo && file_exists(public_path($partner->partner_logo))) {
                unlink(public_path($partner->partner_logo));
            }
    
            // Upload the new image
            $image = $request->file('partner_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/partner/';
            $image->move(public_path($imagePath), $imageName);
    
            // Update the image path
            $partner->partner_logo = $imagePath . $imageName;
        }
    
        // Update the rest of the fields
        $partner->update([
            'partner_collaborations' => $request->input('partner_collaborations'),
        ]);
    
        $this->toastr->success('Partner updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        $this->toastr->success('Partner Deleted successfully!');
        return back();
    }
}
