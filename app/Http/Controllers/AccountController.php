<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\CustomerResetToken;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
class AccountController extends Controller
{
    public function login(){
        return view("web.account.login");
    }
    public function check_login(Request $request){
         $request->validate([
            'email' => "required|email|exists:customers",
            'password' => "required",

         ],[
            "email.required" => "Email must not be empty",
            "password.required" => "Password must not be empty",
            'email.email' => "Please enter a valid email format",
            'email.exists' => "This email does not exist in the system. Please check again or register a new account."
         ]);
         $data = $request->only("email","password");
         $check = auth("customers")->attempt($data);
         if($check){
            if(auth("customers")->user()->email_verified_at == ""){
                auth("customers")->logout();
                return redirect()->back()->with("error","Your account is not verified");
            }
            else{
                return redirect()->route("home.index")->with("success","Login successfully");
            }
         }
         return redirect()->back()->with("error","Your email or password is incorrect");
    }
    public function register(){
        return view("web.account.register");
    }
    
    public function check_register(Request $request){
        $request->validate([
            'name' => "required|min:6|max:32",
            'email' => "required|email|unique:customers",
            'phone' => "required|unique:customers",
            'address' => "required",
            'password' => "required|min:6",
            'confirm-password' => "required|same:password",
        ],[
            "name.required" => "Name must not be empty",
            "email.required" => "Email must not be empty",
            "phone.required" => "Phone number must not be empty",
            "address.required" => "Address must not be empty",
            "password.required" => "Password must not be empty",
            "confirm-password.required" => "Confirm password must not be empty",

            'name.min' => "Name must be at least 6 characters",
            'password.min' => "Password must be at least 6 characters",

            'email.email' => "Please enter a valid email format",

            'email.unique' => "This email is already registered, please use another email",
            'phone.unique' => "This phone number is already registered, please use another email",
            'confirm-password.same' => "The confirm password must match the password"
        ]);
        $data = $request->only("name","phone","email","address","gender");
        $data['password'] = bcrypt($request->password);
        if($account = Customer::create($data)){
            Mail::to($account->email)->send(new VerifyAccount($account));
            return redirect()->route("account.login")->with("success","Register successfully, please check your email to verify account !");
        }
        return redirect()->back()->with("error","Something went wrong, please try again !");
    }
    public function logout(){
        auth("customers")->logout();
        return redirect()->route("account.login");
    }
    public function verify($email){
        $account = Customer::where("email",$email)->whereNull("email_verified_at")->firstOrFail();
        Customer::where("email",$email)->update(['email_verified_at' => date("Y-m-d")]);
        return redirect()->route("account.login")->with("success","Verify successfully !");

    }
    public function profile(){
        $profile = auth("customers")->user();
        return view("web.account.profile",compact("profile"));
    }
    public function check_profile(Request $request){
        $profile = auth("customers")->user();
       

        $request->validate([
            'name' => "required|min:6|max:32",
            'email' => "required|email|unique:customers,email,".$profile->id,
            'phone' => "required|unique:customers,phone,".$profile->id,
            'address' => "required",
           "password"  => ['required',function($attr,$value,$fail) use($profile){
                if(!Hash::check($value, $profile->password)){
                return $fail('Your password is incorrect');

                }
            }],
            
        ],[
            "name.required" => "Name must not be empty",
            "email.required" => "Email must not be empty",
            "phone.required" => "Phone number must not be empty",
            "address.required" => "Address must not be empty",
            
           

            'name.min' => "Name must be at least 6 characters",
            

            'email.email' => "Please enter a valid email format",

            'email.unique' => "This email is already registered, please use another email",
            'phone.unique' => "This phone number is already registered, please use another email",
            
        ]);
        $data = $request->only("name","email","phone","address","gender");
        $profile->update($data);
        return redirect()->back()->with("success","Update profile successful !");
    }
    public function forgot_password(){
        return view("web.account.forgot_password");
    }
    public function check_forgot_password(Request $request){
         $request->validate([
            'email' => "required|email|exists:customers",
           

         ],[
            "email.required" => "Email must not be empty",
            'email.email' => "Please enter a valid email format",
            'email.exists' => "This email does not exist in the system. Please check again or register a new account."
         ]);
        //  $data = $request->only("email");

        $customer = Customer::where("email",$request->email)->first();
        $token = Str::random(40);
        $data = [
            'email'=> $request->email,
            'token' => $token
        ];
        if(CustomerResetToken::create($data)){
        Mail::to($request->email)->send(new ForgotPassword($customer,$token));
         return redirect()->route("account.login")->with("success","Please check your email to get password");

        }else{
            return redirect()->back()->with("error","Something went wrong, please try again");
        };

    }
    public function reset_password($token){ 
        $tokenData = CustomerResetToken::where("token",$token)->firstOrFail();
        return view("web.account.reset_password",compact("tokenData"));

       
    }
    public function check_reset_password(Request $request,$token){
        $request->validate([
            'password'=> "required|min:6",
            'confirm-password' => "required|same:password"
        ],
        [
            "password.required" => "New password must not be empty",
            "password.min" => "Password must be at least 6 characters",
            "confirm-password.required" => "Confirm password must not be empty",
            'confirm-password.same'  => "The confirm password must match the password"
        ]);
        $tokenData = CustomerResetToken::where("token",$token)->firstOrFail();
        $customer = $tokenData->customer;
       
        $data = [
            'password' => bcrypt($request->password)
        ];
        if( $customer->update($data)){
            return redirect()->route("account.login")->with("success","Change password successful, now you login");
        }else {
            return redirect()->back()->with("error","Something went wrong, please try again");
        }
    }
    public function change_password(){
        return view("web.account.change_password");
    }
    public function check_change_password(Request $request){
        $profile = auth("customers")->user();
        $request->validate([
            'current-password' => ['required',function($attr,$value,$fail) use($profile){
                    if(!Hash::check($value,$profile->password)){
                        return $fail('Your current password is incorrect');
                    }
            }],
            'password' => "required|min:6",
            'confirm-password' => "required|same:password"
        ],
        [
            "current-password.required" => "Current password must not be empty",
            "password.required" => "New password must not be empty",
            "password.min" => "Password must be at least 6 characters",
            "confirm-password.required" => "Confirm password must not be empty",
            'confirm-password.same'  => "The confirm password must match the password"
        ]
    );
    $data['password'] = bcrypt($request->password);
    $profile->update($data);
    if($profile->update($data)){
    return redirect()->route("home.index")->with("success","Change password successful");

    }else{
    return redirect()->route("account.change-password")->with("error","Something went wrong, please try again !");

    }
    }
    public function wishlist(){
        $favorites = auth('customers')->user()->favorites ? auth('customers')->user()->favorites: [];
        
        return view("web.home.favorite",compact("favorites"));
    }
}
