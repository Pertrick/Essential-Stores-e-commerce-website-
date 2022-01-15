<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {   $sn =1;
        $users = User::with('roles')->get();
        return view('admin.user.index', compact('users', 'sn'));
    }

    public function assignRoles(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if($user->roles){
            $user->roles()->detach();
        }

        if($request['role_user'])
        {
            $user_role = Role::where('name', 'User')->first();
            $user->roles()->attach($user_role);
            return redirect()->back()->with('message', 'user role assigned');
        }

        if($request['role_admin'])
        {
            $admin_role = Role::where('name', 'Administrator')->first();
            $user->roles()->attach($admin_role);
            return redirect()->back()->with('message', 'admin role assigned');

        }

        return redirect()->back();
    }


}
