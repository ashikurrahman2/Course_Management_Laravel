<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
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
            $news = News::all();
            return DataTables::of($news)
                ->addIndexColumn() 
                ->addColumn('news_image', function ($row) {
                    if ($row->news_image) {
                        return '<img src="' . asset($row->news_image) . '" alt="news image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                ->rawColumns(['news_image', 'action'])
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

            'news_title' => 'required|string|max:500',
            'news_date' => 'required|date|max:500',
            'news_via' => 'required|string|max:500',
            'news_description' => 'required|string|max:500',
            'news_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
          //  Remove HTML tag
          $request->merge([
            'news_description' => strip_tags($request->news_description),
        ]);

        News::newNews($request);
        $this->toastr->success('News created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
          // Validate the incoming request
          $validated = $request->validate([
            'news_title' => 'required|string|max:500',
            'news_date' => 'required|date|max:500',
            'news_via' => 'required|string|max:500',
            'news_description' => 'required|string|max:500',
            'news_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image file is uploaded
        if ($request->hasFile('news_image')) {
            // Delete the old image if exists
            if ($news->news_image && file_exists(public_path($news->news_image))) {
                unlink(public_path($news->news_image));
            }

            // Upload the new image
            $image = $request->file('news_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/news/';
            $image->move(public_path($imagePath), $imageName);

            // Update the image path
            $news->news_image = $imagePath . $imageName;
        }

        // Update the rest of the fields
        $news->update([
            'news_title' => $validated['news_title'],
            'news_date' => $validated['news_date'],
            'news_via' => $validated['news_via'],
            'news_description' => $validated['news_description'],
            'news_image' => $validated['news_image'],
        ]);

        $this->toastr->success('News updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        $this->toastr->success('News Deleted successfully!');
        return back();
    }
}
