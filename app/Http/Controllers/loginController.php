<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public static function get(){



        // $user = User::create([

        //     'name' => 'transfer',
        //     'username' => 'transfer',
        //     'role' => 'transfer',
        //     'status' => '1',
        //     'email' => 'transfer@gmail.com',
        //     'password' => bcrypt('transfer')

        // ]);

        // $token = $user->createtoken('costumerToken')->plainTextToken;
        
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];

        // return response($response, 201);
        return view('login'); 


    }
    public static function post(Request $request){


        $credentials = $request->validate(
                                [
                                    'username' => 'required',
                                    'password' => 'required',
                                ]
                            );  
        
        if (Auth::attempt($credentials)) {

            //Code for good credentials
            $request->session()->regenerate();

            if( Auth::user()->status == 1){

                if(Auth::user()->role == 'admin'){
                    return redirect()->intended('/admin');
                    
                }else{
                    
                    return redirect()->intended('/');
                }
            }
        }


        return back()->withErrors([
            'notmatch' => 'The provided credentials do not match our records.',
        ]);

    }

    // Register a new costumer
    public function register(Request $request){
        $fields = $request->validate([

            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'

        ]);
        
        $user = User::create([

            'name' => $fields['name'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])

        ]);

        $token = $user->createtoken('costumerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function auth(Request $request){
        $fields = $request->validate([

            'email' => 'required|string',
            'password' => 'required|string'

        ]);

        // Check the email
        $user = User::where('email', $fields['email'])->first();

        // Check the password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'invalid credentials'
            ], 401);
        }


        $token = $user->createtoken('costumerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public static function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
