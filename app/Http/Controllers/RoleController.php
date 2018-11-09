<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\User_role;

class RoleController extends Controller
{
    public function showRole()
    {
        $role = Role::get();
        return view('pages.role', compact('role'));
    }

    public function addRoleForm ()
    {
        return view('pages.add_role');
    }

    public function addRole(Request $request)
    {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $slug = str_slug($request->role, '.');

        $role = Role::create([
            'name' => $request->role,
            'description' => $request->description,
            'slug' => $slug
        ]);

        return redirect()->route('role.table')->with('role_added','User Successfully updated ');
    }

    public function editRole(Role $role)
    {
        $id = $role->id;
        $editrole = Role::where('id','=', $id)->get();
        return view('pages.edit_role', compact('editrole'));
    }

    public function updateRole(Request $request)
    {

        $this->validate($request, [
            'role'=> 'required',
        ]);

        $slug = str_slug($request->role, '.');
        $id = $request->id;
        $role = Role::where('id',$id);

        $role->update([
            'name' => request('role'),
            'description' => request('description') ,
            'slug'=> $slug,
        ]);

        return redirect()->route('role.table')->with('role_updated','User Successfully updated ');
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return redirect()->route('role.table')->with('role_deleted','User Successfully updated ');
    }


}
