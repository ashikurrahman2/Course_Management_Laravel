<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
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
            $agent = Agent::all();
            return DataTables::of($agent)
                ->addIndexColumn() 
                ->addColumn('agent_image', function ($row) {
                    if ($row->agent_image) {
                        return '<img src="' . asset($row->agent_image) . '" alt="agent image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                <form id="delete-form-' . $row->id . '" action="' . route('agent.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['agent_image', 'action'])
                ->make(true);
        }
        return view('admin.pages.agent.index');
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

            'agent_designation' => 'required|string|max:500',
            'agent_name' => 'required|string|max:500',
            'agent_face' => 'required|string|max:500',
            'agent_linked' => 'required|string|max:500',
            'agent_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Agent::newAgent($request);
        $this->toastr->success('Agent created successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('admin.pages.agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        // Validate the request
        $request->validate([
            'agent_designation' => 'required|string|max:500',
            'agent_name' => 'required|string|max:500',
            'agent_face' => 'required|string|max:500',
            'agent_linked' => 'required|string|max:500',
            'agent_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if a new image file is uploaded
        if ($request->hasFile('agent_image')) {
            // Delete the old image if exists
            if ($agent->agent_image && file_exists(public_path($agent->agent_image))) {
                unlink(public_path($agent->agent_image));
            }
    
            // Upload the new image
            $image = $request->file('agent_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/agent/';
            $image->move(public_path($imagePath), $imageName);
    
            // Update the image path
            $agent->agent_image = $imagePath . $imageName;
        }
    
        // Update the rest of the fields
        $agent->update([
            'agent_designation' => $request->input('agent_designation'),
            'agent_name' => $request->input('agent_name'),
            'agent_face' => $request->input('agent_face'),
            'agent_linked' => $request->input('agent_linked'),
        ]);
    
        $this->toastr->success('Agent updated successfully!');
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();
        $this->toastr->success('Agent Deleted successfully!');
        return back();
    }
}
