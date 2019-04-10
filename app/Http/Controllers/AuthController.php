<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

    public function loginForm()
    {
    	return view('pages.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email'	=>	'required|email',
    		'password'	=>	'required'
    	]);

    	if(Auth::attempt([
    		'email'	=>	$request->get('email'),
    		'password'	=>	$request->get('password')
    	]))
    	{
    		return redirect('/admin');
    	}

    	return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
