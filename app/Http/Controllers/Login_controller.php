<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Items_model;

class Login_controller extends Controller
{
    function index(){
    	if(isset(Auth::user()->email_id)){
    		return redirect('dashboard');
  		 }else{
     		return view('login');
  		}
    }

    function check(Request $request){

		$this->validate($request, [
		'email_id'   => 'required|email',
		'password'  => 'required|min:3'
		]);

	     $user_data = array(
	      'email_id'  => $request->get('email_id'),
	      'password' => $request->get('password')
	     );

	     if(Auth::attempt($user_data))
	     {
	        return redirect('dashboard');
	     }
	     else
	     {
	      	return back()->with('error', 'Wrong Login Details');
	     }
    }

    function dashboard(){
    	if(isset(Auth::user()->email_id)){
            $data['items'] = Items_model::all();
            $data['page_title'] = 'Dashboard';
            return view('dashboard', $data);
  		 }else{
     		return redirect('login');
  		}
    }

    function logout() {
	     Auth::logout();
	     return redirect('login');
    }
}
