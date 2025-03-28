<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellformController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */

         // Approve loan application
    public function approve($id)
    {
        $application = Sell::findOrFail($id);
        if ($application->status !== 'pending') {
            return redirect()->route('sells.index')->with('error', 'sell application cannot be approved.');
        }
        $user = User::find($application->user_id);
        $user->save();

        $application->update(['status' => 'approved']);

        return redirect()->route('sells.index')->with('success', 'sell application approved successfully.');
    }

       // Reject loan application
       public function reject($id)
       {
           $application = Sell::findOrFail($id);
           $application->update(['status' => 'rejected']);
   
           return redirect()->route('sells.index')->with('success', 'sell application rejected successfully.');
       }
    public function index()
    {
        $applications = Sell::all();
        return view('admin.pages.sellapplication.index', compact('applications'));
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
         // Validation rules
         $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zilla' => 'required|string|max:255',
            'bds' => 'required|string|max:255',
            'qnty' => 'required|string',
            'morrja' => 'required|string',
            'category' => 'nullable|string|max:50',
            'road' => 'required|string|max:255',
            'price' => 'required|string',
            'bayna' => 'required|numeric',    
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // File upload for photo
        $photoPath = $request->file('image')->store('image', 'public');

        // Save data to the database
        $loanApplication = Sell::create([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'zilla' => $request->zilla,
            'bds' => $request->bds,
            'qnty' => $request->qnty,
            'morrja' => $request->morrja,
            'category' => $request->category,
            'road' => $request->road,
            'price' => $request->price,
            'bayna' => $request->bayna,
            'image' => $photoPath,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Sell form application submitted successfully!');
    }

}





