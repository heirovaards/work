<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\User_role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController extends Controller
{
// login page
    public function getLogin()
    {
        return View('pages.login');
    }

    //  login retrieval
    public function postLogin(Request $request)
    {
//    login validator
        $this->validate($request, [
            'password' => 'required',
            'login' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->login,
            'password' => $request->password]))
        {

//          user role verification
            $user = User::find(Auth::user()->id);
//            if ($user->hasRole('user'))
//            {
//                return redirect()->route('');
//            }
//
//            elseif ($user->hasRole('admin'))
//            {
//                return redirect()->route('');
//            }
            return redirect()->route('pages.profile');
        }

        else
        {
            return redirect()->route('pages.login')->with('loginError', 'user not found');
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('pages.login');
    }

}
