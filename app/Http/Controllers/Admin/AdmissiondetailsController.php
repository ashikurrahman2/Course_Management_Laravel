<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admissiondata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdmissiondetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admissiondata::all();
        return view('admin.pages.admissiondetails.index', compact('admissions'));
    }

        // Statement Download
        public function download($id)
    {
        $admission = Admissiondata::findOrFail($id);

        // PDF generate
        $pdf = Pdf::loadView('admin.pages.admissiondetails.pdf', compact('admission'));

        // Download
        return $pdf->download('Admission_'.$admission->id.'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validation
        $request->validate([
            'stu_name'     => 'required|string|max:255',
            'stu_email'    => 'required|email|string|max:255',
            'stu_phone'    => 'required|string|max:20',
            'stu_gender'   => 'required|string',
            'stu_course'   => 'required|string',
            'stu_address'  => 'required|string',
            'payment_method' => 'required|string',
            'payment_number' => 'required|string',
            'stu_division' => 'required|string',
            'stu_distict'  => 'required|string',
            'stu_photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        Admissiondata::newAdmission($request);
        return back();
    }
}
