<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests; // for get permissions
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use app\Models\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Permission;

class AdminUserController extends BaseController
{


    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;

        $this->middleware('permission:view user')->only(['index']);
        $this->middleware('permission:create user')->only(['create','store']);
        $this->middleware('permission:update user')->only(['edit','update']);
        $this->middleware('permission:delete user')->only(['destroy']);
    }
    // protected $flasher;

    // public function __construct(FlasherInterface $flasher)
    // {
    //     $this->flasher = $flasher;

    //     $this->middleware('permission:view user')->only(['index']);
    //     $this->middleware('permission:create user')->only(['create','store']);
    //     $this->middleware('permission:update user')->only(['edit','update']);
    //     $this->middleware('permission:delete user')->only(['destroy']);
    // }
    public function index(){
        $users = Admin::all();
    return view('admin.role-permission.user.index', compact('users'));
    }
    
    public function create()
    {
        // Fetch all roles to populate the role dropdown
        $roles = Role::all();

        return view('admin.role-permission.user.create', compact('roles'));
    }

    /**
     * Store a new user in the database.
     */
     
    public function store(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name,guard_name,admin', // Validate role by name and guard_name
        ]);
    
        // Create the admin
        $user = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Assign multiple roles by name to the admin
        $user->syncRoles($request->roles); // Pass role names, not IDs
    
        // Redirect with success message
        $this->toastr->success('User created successfully!');
        return redirect()->route('users.index');
    }
    
    public function edit($id)
    {
        // Fetch the user by ID
        $user = Admin::findOrFail($id);
    
        // Fetch all available roles
        $roles = Role::all();
    
        // Pass the user and roles to the view
        return view('admin.role-permission.user.edit', compact('user', 'roles'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'roles' => 'required|array', // Ensure roles are selected
            'roles.*' => 'exists:roles,name,guard_name,admin', // Validate that each role exists and has the correct guard_name
        ]);
    
        // Find the user by ID
        $user = Admin::findOrFail($id);
    
        // Update the user details
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
    
        // Sync the selected roles to the user
        $user->syncRoles($request->roles);
    
        // Redirect with a success message
        $this->toastr->success('User updated successfully!');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = Admin::findOrFail($id);
    
        // Delete the user
        $user->delete();
    
        // Redirect with a success message
        $this->toastr->success('User deleted successfully!');
        return redirect()->route('users.index');
    }

}
