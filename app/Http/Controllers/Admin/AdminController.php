<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }
    public function login(){
       
        return view("admin.login");
    }
    public function check_login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ],
        [
            "email.required" => "Email must not be empty",
            "password.required" => "Password must not be empty",
            'email.email' => "Please enter a valid email format",
            'email.exists' => "This email does not exist in the system. Please check again or register a new account."
        ]
    );
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route("admin.index")->with("success","Login successful");
        }
        else return redirect()->back()->with("error","Something went wrong, please try again ");
    }
    public function logout(){
        
        auth()->logout();
        return redirect()->route("admin.login");
    
    }
}
