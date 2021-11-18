<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    //Normal tours 
    public static function get(Request $request){
       
        #Normal post
        if(!DB::table('post') ->where('status', '=', 1)->where('is_special', '!=', 1)->first()){
            $post = null;
        }else{
            $post = DB::table('post') ->where('status', '=', 1)->orderBy('category', 'asc')->get();
        }
        #Special post
        if(!DB::table('post')->where('status', '=', 1)->where('is_special', '=', 1)->first()){
            $post_special = null;
        }else{
            $post_special = DB::table('post')->where('status', '=', 1)->where('is_special', '=', 1)->get();
        }

        return view('home',  ['products'=>$post, 'products_special'=>$post_special, 'action' => 'post'] );
    }

    //Transfers tours
    public static function getTransfers(Request $request){
       
        #Normal post
        if(!DB::table('post') ->where('status', '=', 1)->where('is_special', '!=', 1)->first()){
            $post = null;
        }else{
            $post = DB::table('post') ->where('status', '=', 1)->orderBy('category', 'asc')->get();
        }
        #Special post
        $post_special = null;

        return view('home',  ['products'=>$post, 'products_special'=>$post_special, 'action' => 'transfers']);

    }

}
