<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email'         => 'bail|required|email',
            'password'      => 'bail|required|string',
        ]);

        $credentials = $request->only('email', 'password', 'remember');

        dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        Session::flash('message', 'Credential Missmatch');
        Session::flash('alert-class', 'alert-danger'); 
        return redirect('/login');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
