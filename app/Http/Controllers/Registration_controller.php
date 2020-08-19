<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Registration_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {

        $validatedData = $request->validate([
            'user_name' => 'required|min:3',
            'email_id' => 'required|email|unique:users,email_id',
            'password' => 'required|min:3',
            'repeat_password' => 'required|same:password',
        ]);
        $input = $request->except('repeat_password', '_token');
        $input['password'] = bcrypt($input['password']);
        User::create($input);

        return back()->with('success', 'User created successfully.');
    }
}
