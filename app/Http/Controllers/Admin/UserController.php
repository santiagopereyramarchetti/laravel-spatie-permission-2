<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRoles(Request $request, User $user){

        if($user->hasRole($request->role)){
            return back()->with('message', 'This user already have this role');
        }else{
            $user->assignRole($request->role);
            return back()->with('message', 'Role successfully added');
        }

    }

    public function removeRole(User $user, Role $role){

        if(!$user->hasRole($role)){
            return back()->with('message', 'This user does not have this role');
        }else{
            $user->removeRole($role);
            return back()->with('message', 'Role successfully removed');
        }

    }

    public function givePermissions(Request $request, User $user){

        if($user->hasPermissionTo($request->permission)){
            return back()->with('message', 'This user already have that permission');
        }else{
            $user->givePermissionTo($request->permission);
            return back()->with('message', 'Permission successfully assigned');
        }

    }

    public function revokePermission(User $user, Permission $permission){
        if(!$user->hasPermissionTo($permission)){
            return back()->with('message', 'This role does not have that permission');
        }else{
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission successfully revoked');
        }
    }

}
