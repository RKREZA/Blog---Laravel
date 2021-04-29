<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
        return view('dashboard');
    }

}
