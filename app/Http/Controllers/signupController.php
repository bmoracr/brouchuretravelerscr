<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    public static function post(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
            );
    }
}
