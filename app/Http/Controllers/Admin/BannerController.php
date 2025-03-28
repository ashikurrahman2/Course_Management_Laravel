<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
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
            $banner = Banner::all();
            return DataTables::of($banner)
                ->addIndexColumn() 
                ->addColumn('banner_icon', function ($row) {
                    if ($row->banner_icon) {
                        return '<img src="' . asset($row->banner_icon) . '" alt="banner icon" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                <form id="delete-form-' . $row->id . '" action="' . route('news.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['banner_icon', 'action'])
                ->make(true);
        }
        return view('admin.pages.news.index');
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

            'title' => 'required|string|max:500',
            'sub_title' => 'required|string|max:500',
            'banner_location' => 'required|string|max:500',
            'banner_category' => 'required|string|max:500',
            'banner_status' => 'required|string|max:500',
            'banner_bedroom' => 'required|integer|max:500',
            'banner_bathroom' => 'required|integer|max:500',
            'banner_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Banner::newBanner($request);
        $this->toastr->success('Banner info created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.pages.news.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
         // Validate the incoming request
         $validated = $request->validate([
            'title' => 'required|string|max:500',
            'sub_title' => 'required|string|max:500',
            'banner_location' => 'required|string|max:500',
            'banner_category' => 'required|string|max:500',
            'banner_status' => 'required|string|max:500',
            'banner_bedroom' => 'required|integer|max:500',
            'banner_bathroom' => 'required|integer|max:500',
            'banner_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image file is uploaded
        if ($request->hasFile('banner_icon')) {
            // Delete the old image if exists
            if ($banner->banner_icon && file_exists(public_path($banner->banner_icon))) {
                unlink(public_path($banner->banner_icon));
            }

            // Upload the new image
            $image = $request->file('banner_icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/news/';
            $image->move(public_path($imagePath), $imageName);

            // Update the image path
            $banner->banner_icon = $imagePath . $imageName;
        }

        // Update the rest of the fields
        $banner->update([
            'title' => $validated['title'],
            'sub_title' => $validated['sub_title'],
            'banner_location' => $validated['banner_location'],
            'banner_category' => $validated['banner_category'],
            'banner_status' => $validated['banner_status'],
            'banner_bedroom' => $validated['banner_bedroom'],
            'banner_bathroom' => $validated['banner_bathroom'],
            'banner_icon' => $validated['banner_icon'],
        ]);

        $this->toastr->success('Banner info updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        $this->toastr->success('Banner info Deleted successfully!');
        return back();
    }
}
