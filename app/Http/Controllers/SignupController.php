<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{

    protected $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'bail|required|string',
            'email'         => 'bail|required|email|unique:users',
            'password'      => 'bail|required|string',
        ]);

        $encrypted_password = Hash::make($request->input('password'));

        $check_user = $this->user->where('email',$request->input('email'))->first();

        if ($check_user == null) {
            $store = $this->user->create([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => $encrypted_password,
            ]);

            Session::flash('message', 'Registration successful');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');

        }else{
            Session::flash('message', 'User Already Exists');
            Session::flash('alert-class', 'alert-warning'); 
            return redirect('/');
        }


    }

}
