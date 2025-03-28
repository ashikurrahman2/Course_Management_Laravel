<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests; // for get permissions
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends BaseController
{
    use ValidatesRequests; // Include the middleware handling trait

    protected $flasher;

    public function __construct(FlasherInterface $flasher)
    {
        $this->flasher = $flasher;

        // Apply middleware to specific methods
        $this->middleware('permission:view role')->only(['index']);
        $this->middleware('permission:create role')->only(['create','store','addPermissionToRole','givePermissionToRole']);
        $this->middleware('permission:update role')->only(['edit','update']);
        $this->middleware('permission:delete role')->only(['destroy']);
    }
    
    public function index(){
        $roles = Role::all();
    return view('admin.role-permission.role.index', compact('roles'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.role-permission.role.create', compact('roles'));

    }

    // public function store(Request $request){

    //     $request->validate([
    //         'name'=>[
    //             'required',
    //             'string',
    //             'unique: roles, name'
    //         ]
    //     ]);

    //     Permission::newPermission($request);
    //     $this->toastr->success('Permission Created successfully!');
    //     return back();

    // }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:roles,name',
    ]);

    Role::create(['name' => $request->name]);
    $this->flasher->addSuccess( 'Role created successfully!');
    return redirect()->route('roles.index');
}

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('admin.role-permission.role.edit', compact('role'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        $this->flasher->addSuccess('Role updated successfully!');
        return redirect()->route('roles.index');
        // return redirect()->route('roles.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $this->flasher->addSuccess('Role deleted successfully!');
        return redirect()->route('roles.index');
    }
    public function addPermissionToRole($id){
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        return view('admin.role-permission.role.add-permissions', compact('role','permissions'));

    }
    

    public function givePermissionToRole(Request $request, $id)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);

        $this->flasher->addSuccess('Permissions added to role successfully!');
        return redirect()->route('roles.index');
    }


}
