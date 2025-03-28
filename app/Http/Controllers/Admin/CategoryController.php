<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
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
            $category = Category::all();
            return DataTables::of($category)
                ->addIndexColumn() 
                ->addColumn('category_image', function ($row) {
                    if ($row->category_image) {
                        return '<img src="' . asset($row->category_image) . '" alt="category icon" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                ->rawColumns(['category_image', 'action'])
                ->make(true);
        }
        return view('admin.pages.category.index');
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

            'category_name' => 'required|string|max:500',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Category::newCategory($request);
        $this->toastr->success('Category info created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'category_name' => 'required|string|max:500',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if a new image file is uploaded
        if ($request->hasFile('category_image')) {
            // Delete the old image if exists
            if ($category->category_image && file_exists(public_path($category->category_image))) {
                unlink(public_path($category->category_image));
            }
    
            // Upload the new image
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/category/';
            $image->move(public_path($imagePath), $imageName);
    
            // Update the image path in the database
            $category->category_image = $imagePath . $imageName;
        }
    
        // Update the rest of the fields (excluding category_image if no new image is uploaded)
        $category->update([
            'category_name' => $validated['category_name'],
        ]);
    
        // If a new image was uploaded, save it separately
        if ($request->hasFile('category_image')) {
            $category->update(['category_image' => $category->category_image]);
        }

        // Success message 
        $this->toastr->success('Category info updated successfully!');
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $this->toastr->success('Category info Deleted successfully!');
        return back();
    }
}
