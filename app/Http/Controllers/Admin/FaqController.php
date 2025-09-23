<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    // Toastr message
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
        $faqs = Faq::all();
        return DataTables::of($faqs)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionbtn = '
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-' . $row->id . '" action="' . route('faq.destroy', $row->id) . '" method="POST" style="display: none;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                    </form>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('admin.pages.faq.index');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ques' => 'required|string|max:500',
            'ans'   => 'required|string',
        ]);
          //  Remove HTML tag
            $request->merge([
            'ans'    => strip_tags($request->ans),
            ]);

        Faq::newFaq($request);
        $this->toastr->success('FAQ created successfully!');
        return back();
    }

    /**
 * Display the specified resource.
 */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ques'  => 'required|string|max:500',
            'ans'   => 'required|string',
        ]);

        Faq::updateFaq($request, $id);
        $this->toastr->success('FAQ updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        $this->toastr->success('FAQ deleted successfully!');
        return back();
    }
}
