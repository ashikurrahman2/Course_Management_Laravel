<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    // Tostr massage calling
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
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-' . $row->id . '" action="' . route('banner.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.banner.index');
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
        ]);

         //  Remove HTML tag
          $request->merge([
            'sub_title'                  => strip_tags($request->sub_title),
        ]);

        // Fetch data
         Banner::newBanner($request);
         $this->toastr->success('Banner created successfully!');
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
        return view('admin.pages.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {       
        // Validation data
            $request->validate([
            'title' => 'required|string|max:500',
            'sub_title' => 'required|string|max:500',
        ]);

         // Fetch Data 
        Banner::updateBanner($request, $id);
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
        $this->toastr->success('Banner Deleted successfully!');
        return back();
    }
}
