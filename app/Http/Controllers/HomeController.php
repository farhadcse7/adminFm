<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Gate::authorize('access-dashboard'); // authorize this user to access/give access to admin dashboard
        
        $user_count = User::count();
        $role_count = Role::count();
        $page_count = Page::count();
        $module_count = Module::count();
        $users = User::with(['role'])->latest('id')->paginate();

        return view('admin.pages.dashboard', compact(
            'user_count',
            'role_count',
            'page_count',
            'module_count',
            'users'));
    }
}
