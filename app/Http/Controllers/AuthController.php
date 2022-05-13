<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $data = [];
        $data["categories"] = Category::all();
        //dd($data);
        return view('auth.register', $data);
    }

    public function register_post(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed', //regex:/[a-zA-Z]/|regex:/[0-9]/
            'store_name' => 'nullable|string',
            'category' => 'nullable|integer|exists:categories,id',
            'is_store_open' => 'required'
        ]);
        
        if($validator->fails()) {            
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'store_name' => isset($request->store_name) ? $request->store_name : null,
            'categories_id' => isset($request->category) ? $request->category : null,
            'store_status' => isset($request->is_store_open) ? 1 : 0,
        ]);

        $credential = $request->only('email', 'password'); 
        $check = User::where('email', $request->email)->first();
        
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
