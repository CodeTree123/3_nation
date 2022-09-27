<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password'=>Hash::make($request['password']),
            'created_at'   =>Carbon::now()
        ]);
        if($user){
            return back() ->with('success','Successfully Registered');            
        }else{
            return back() ->with('fail','Please Check Your Information Properly');
        }
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        // dd($request->all());
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            // return Redirect::index();
            return redirect()->route('index');
        }
        else{
            return Redirect::back()->with('fail','Please Check Your Information Properly');
        }

    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
    
}
