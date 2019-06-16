<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller {
    // show login form
    public function showLoginForm() {
    	return view('auth.admin-login');
    }


    // login
    public function login() {
    	# code...
    }
}
