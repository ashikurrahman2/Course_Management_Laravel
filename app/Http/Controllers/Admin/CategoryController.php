<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
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
            $category= Category::all();
            return DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa fa-edit"></i>
                              </a>
                              <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                <i class="fa fa-trash"></i>
                              </button>
                              <form id="delete-form-' . $row->id . '" action="' . route('categories.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                              </form>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
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
        // Validation process
            $request->validate([

            'category_name' => 'required|string|max:500',
        ]);

          // Fetch data from database 
         Category::newCategories($request);
         $this->toastr->success('Category created successfully!');
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
    public function update(Request $request, $id)
    {
         // Validation process
            $request->validate([

            'category_name' => 'required|string|max:500',
        ]);

           // Fetch Data 
        Category::updateCategories($request, $id);
        
        // Success Message
        $this->toastr->success('Category updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $this->toastr->success('Category Deleted successfully!');
        return back();
    }
}
