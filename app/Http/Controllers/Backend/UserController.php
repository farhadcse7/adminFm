<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['role:id,role_name,role_slug'])
        ->select(['id', 'role_id', 'name', 'email', 'updated_at'])
        ->latest()
        ->paginate();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select(['id', 'role_name'])->get();
        return view('admin.pages.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        User::updateOrCreate([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);


        Toastr::success('User created Successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::select(['id', 'role_name'])->get();
        return view('admin.pages.users.edit',compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Toastr::success('User updated Successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('User deleted Successfully');
        return redirect()->route('users.index');
    }
}
