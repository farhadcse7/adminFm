<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('index-role'); // authorize this user to access/give access to admin dashboard
        $roles = Role::with(['permissions:id,permission_name,permission_slug'])->select(['id', 'role_name', 'is_deleteable', 'updated_at'])->get();
        return view('admin.pages.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-role'); // authorize this user to access/give access to admin dashboard
        $modules = Module::with(['permissions:id,module_id,permission_name,permission_slug'])->select(['id', 'module_name'])->get();
        // return $modules;
        return view('admin.pages.role.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        Gate::authorize('create-role'); // authorize this user to access/give access to admin dashboard
        Role::updateOrCreate([
            'role_name' => $request->role_name,
            'role_slug' => Str::slug($request->role_name),
            'role_note' => $request->role_note,
        ])->permissions()->sync($request->input('permissions', []));

        Toastr::success('Role created Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Gate::authorize('edit-role'); // authorize this user to access/give access to admin dashboard
        $role = Role::with(['permissions'])->find($id);
        $modules = Module::with(['permissions:id,module_id,permission_name,permission_slug'])->select(['id', 'module_name'])->get();
        return view('admin.pages.role.edit', compact('modules', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, $id) //(Request $request, $id)
    {
        Gate::authorize('edit-role'); // authorize this user to access/give access to admin dashboard
        // dd($id);
        $role = Role::find($id);
        $role->update([
            'role_name' => $request->role_name,
            'role_slug' => Str::slug($request->role_name),
            'role_note' => $request->role_note,
        ]);
        $role->permissions()->sync($request->input('permissions', []));

        Toastr::success('Role updated Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('delete-role'); // authorize this user to access/give access to admin dashboard
        $role = Role::find($id);
        if($role->is_deleteable){
            $role->delete();
            Toastr::success('Role deleted Successfully');
            return redirect()->route('role.index');
        }
        Toastr::error("Role cann't be deleted!!!");
        return redirect()->route('role.index');
    }
}
