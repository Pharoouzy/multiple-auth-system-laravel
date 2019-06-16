<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller {
	// setting up middleware
	function __construct() {
		$this->middleware('guest:admin');
	}
    // show login form
    public function showLoginForm() {
    	return view('auth.admin-login');
    }


    // login
    public function login(Request $request) {
    	// validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	// collecting the form data
    	$credentials = [
    		'email' => $request->email,
    		// attempt() automatically hash the password
    		'password' => $request->password
    	];

    	// attempt to log the user in
    	// $credentials is an array of data from the form data
    	// $remember is a boolean data
    	if (Auth::guard('admin')->attempt($credentials, $request->remember)){
			// if successfully, then redirect to their intended location
			return redirect()->intended(route('admin.dashboard'));
    	}
    	else{
			// if unsuccessful, then redirect back to the login with the form data
			return redirect()->back()->withInput($request->only('email', 'remember'));
    	}

    	

    	
    }
}
