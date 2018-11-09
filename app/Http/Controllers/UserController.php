<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\user;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\User_role;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
   public function showUser()
   {
       $user = User::with('roles')->get();
       return view('pages.user', compact('user'));
   }

    public function addUserForm()
    {
        $roles = Role::get();
        return view('pages.add_user', compact('roles'));
    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'password'=> 'required|min:6|confirmed',
            'name' => 'required|min:6',
            'email' => 'unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email ,
            'password'=> bcrypt($request->password),
        ]);
        $user_role = $request->role;
        $role = Role::where('name', '=', $user_role)->first();
        $user->attachRole($role);

        return redirect()->route('user.table')->with('user_recorded','User Successfully Recorded ');
    }

    public function editUser(User $user)
    {
        $id = $user->id;
        $edituser = User::where('id','=', $id)->get();
        $roles = Role::get();
//        dd($edituser);

        return view('pages.edit_user', compact('edituser', 'roles'));
    }

    public function updateUser(Request $request)
    {

        $this->validate($request, [
            'password'=> 'required|min:6|confirmed',
            'name' => 'required|min:6'
        ]);

        $id = $request->id;
        $user = User::where('id',$id);

        $user->update([
            'name' => request('name'),
            'email' => request('email') ,
            'password'=> bcrypt(request('password')),
        ]);

        $roleupdate = User::find($id);
        $user_role = $request->role;
        $role = Role::where('name', '=', $user_role)->first();

        $roleupdate->syncRoles($role);

        return redirect()->route('user.table')->with('user_updated','User Successfully updated ');
    }

    public function viewUser(User $user)
    {
        $id = $user->id;
        $user = User::with('roles')->where('id', $id)->get();
        return view('pages.view_user', compact('user'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        session()->flash('delete_complete', "deleted");
        return redirect()->back();
    }
}
