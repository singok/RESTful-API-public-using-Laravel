<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password'
        ]);

        $info = User::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($info) {
            return array(
                'success' => 'Record inserted successfully.'  
            );
        } else {
            return array(
                'failure' => 'Something went wrong.'  
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required' 
        ]);

        $existEmail = User::where('email', $request->email)->first();
        if ($existEmail && Hash::check($request->input('password'), $existEmail->password)) {
            return array('success'=>'Login Successfully.');
        } else {
            return array('failure'=>'Credentials doesnot match.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        $request->validate([
            'password' => 'required|min:5',
            'confirm' => 'required|same:password'
        ]);
        $feedback = User::where('email', $email)->update([
            'password' => Hash::make($request->input('password'))
        ]);
        if ($feedback) {
            return array('success' => 'User Password Updated Successfully.');
        } else {
            return array('failure' => 'Something went wrong.');
        }
    }
}
