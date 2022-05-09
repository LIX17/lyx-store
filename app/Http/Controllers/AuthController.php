<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function success()
    {
        return view('auth.success');
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {   
        $error = [];
        $check = User::where('email', $request->email)->first();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //dd($validator->messages()->getMessages());
        if($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $credential = $request->only('email', 'password'); 
        

        if(Auth::attempt($credential))
        {                
            $data = [];
            Session::put('data_user', $check);
            return redirect()->action([HomeController::class, 'index']);
            
        }
        else
        {            
            $error["email"] = ($check == null) ?  "Account does not exist" : "Invalid Password";
            return redirect('login')
                        ->withErrors($error)
                        ->withInput();
        }
        
    }

    public function logout()
    {
        Auth::logout(); 
        Session::forget('data_user');
        return redirect()->action([HomeController::class, 'index']);
    }
}
