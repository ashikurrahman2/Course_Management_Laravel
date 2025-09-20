<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    /**
     * Display a listing of notices.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $notices = Notice::latest()->get();

            return DataTables::of($notices)
                ->addIndexColumn()
                ->addColumn('notice_date', function ($row) {
                    return $row->notice_date
                        ? date('d M, Y', strtotime($row->notice_date))
                        : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>
                        <form id="delete-form-'.$row->id.'" action="'.route('notice.destroy', $row->id).'" method="POST" style="display:none;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.notice.index');
    }

    /**
     * Store a newly created notice.
     */
    public function store(Request $request)
    {
        $request->validate([
            'notice_heading' => 'required|string|max:255',
            'notice_date'    => 'required|date',
            'notice_details' => 'nullable|string',
        ]);

           //  Remove HTML tag
            $request->merge([
            'notice_details'    => strip_tags($request->notice_details),
            ]);

        Notice::newNotice($request);
        $this->toastr->success('Notice created successfully!');
        return back();
    }

    /**
     * Show the form for editing a notice.
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.pages.notice.edit', compact('notice'));
    }

    /**
     * Update a notice.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'notice_heading' => 'required|string|max:255',
            'notice_date'    => 'required|date',
            'notice_details' => 'nullable|string',
        ]);

        Notice::updateNotice($request, $id);
        $this->toastr->success('Notice updated successfully!');
        return back();
    }

    /**
     * Delete a notice.
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        Notice::deleteNotice($notice);
        $this->toastr->success('Notice deleted successfully!');
        return back();
    }
}
