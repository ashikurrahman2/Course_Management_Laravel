<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignmentdetails;
use Illuminate\Http\Request;

class AssignmentdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $applications = Assignmentdetails::all();
           return view('admin.pages.assignmentdetails.index', compact('applications'));
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
            'name'            => 'required|string|max:255',
            'course_name'        => 'required|string|max:255',
            // 'user_id'         => 'required|integer',
            'submission_date' => 'required|string', // আসবে modal থেকে (Sep 11, 2025 - 12:49 PM)
            'assignment_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:2048',
        ]);
               Assignmentdetails::newAssignment($request);

        // Response / redirect
        // $this->toastr->success('Assignment submitted successfully!');

        return back();
    }

}
