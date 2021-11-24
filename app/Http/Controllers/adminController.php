<?php

namespace App\Http\Controllers;

use App\Mail\recoveryPasswordMailable;
use App\Models\post;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public static function admin(){
        return view('admin',['section'=>'admin', 'role'=>Auth::user()->role, 'username'=>Auth::user()->username]);
    }

    public static function get(){
        return view('admin',['section'=>'addpost']);
    }

    public static function getTransfers(){
        return view('admin',['section'=>'addpostTransfers']);
    }

    public static function list(){
        $post = DB::table('post')->where('code', 'not like', '%TRANSFERS-%')->orderBy('category', 'desc')->get();
        return view('admin',['section'=>'listpost', 'products'=>$post]);
    }

    public static function listTransfers(){
        $post = DB::table('post')->where('code', 'like', '%TRANSFERS-%')->orderBy('category', 'desc')->get();
        return view('admin',['section'=>'listpostTransfers', 'products'=>$post]);
    }

    public static function listusers(){
        if(Auth::user()->role == 'admin'){
            $post = DB::table('users')->orderBy('name', 'desc')->get();
        }else{
            $post = DB::table('users')->where('role', '=', 'other')->orderBy('name', 'desc')->get();
        }
        return view('admin',['section'=>'listusers', 'users'=>$post]);
    }


    public static function post(Request $request){

        
        $status = $request->get('status');
        $is_special = $request->get('is_special');
        $not_img = $request->get('not_img');


        if($status == null){ $status = 0; }
        if($is_special == null){ $is_special = 0; }

        $checkbox = ['status'=>$status, 'is_special'=>$is_special] ;


        $fields = $request->validate([
            'code' => 'required|string|unique:post',
            'name' => 'required|string|unique:post',
            'category' => 'required',
            'p_rack' => 'required|numeric',
            'p_neto' => 'required|numeric',
            'p_comssion' => 'required|numeric',
            'includes' => 'required|string',
            'description' => 'required|string',

        ]);

        

        if(!$not_img){

            $imgroute = $_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $fields['code'] . '.jpg';

            if(!$_FILES['img']['tmp_name']){

                return back()->withErrors(['Must select your image'])->withInput();
    
            }else{
    
                if(file_exists($imgroute)){
    
                    return back()->withErrors(['Image already exist to this tour'])->withInput();
    
                }else{
    
                    move_uploaded_file($_FILES['img']['tmp_name'], $imgroute);
                }
    
            }
            
        }else{

            $imgroute = $_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $fields['code'] . '.jpg';

            if(file_exists($imgroute)){
    
                $imgroute = $_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $fields['code'] . '.jpg';

            }else{

                $imgroute = NULL;
            }

            

        }
        

        
        
        $data = $fields + $checkbox + ['created_by'=>Auth::user()->username, 'path_src'=>$imgroute];


         
        DB::table('post')->insert($data);

        return back()->with(['successful'=>'Tour Added successfully!']);


    }

    public static function postTransfers(Request $request){

        
        $status = $request->get('status');
        // $is_special = $request->get('is_special');
        $not_img = $request->get('not_img');


        if($status == null){ $status = 0; }
        $is_special = 0;

        $checkbox = ['status'=>$status, 'is_special'=>$is_special] ;


        $fields = $request->validate([
            'code' => 'required|string|unique:post',
            'name' => 'required|string|unique:post',
            'category' => 'required',
            'p_rack' => 'required|numeric',
            'p_neto' => 'required|numeric',
            'p_comssion' => 'required|numeric',
            'includes' => 'required|string',
            'description' => 'required|string',

        ]);

        $fields['code'] = 'TRANSFERS-' . $fields['code'];

        if(!$not_img){

            $imgroute = $_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $fields['code'] . '.jpg';

            if(!$_FILES['img']['tmp_name']){

                return back()->withErrors(['Must select your image'])->withInput();
    
            }else{
    
                if(file_exists($imgroute)){
    
                    return back()->withErrors(['Image already exist to this tour'])->withInput();
    
                }else{
    
                    move_uploaded_file($_FILES['img']['tmp_name'], $imgroute);
                }
    
            }
            
        }else{

            $imgroute = NULL;

        }
        

        
        
        $data = $fields + $checkbox + ['created_by'=>Auth::user()->username, 'path_src'=>$imgroute];


         
        DB::table('post')->insert($data);

        return back()->with(['successful'=>'Transfer Added successfully!']);


    }

    public static function delete($id){

        if(!empty(DB::table('post')->where('id', '=', $id)->first())){


            $imagepath = DB::table('post')->where('id', '=', $id)->first();
            if(file_exists($_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $imagepath->code . '.jpg')){
                unlink($_SERVER['DOCUMENT_ROOT']  . '/assets/img/tours/' . $imagepath->code . '.jpg');
            }
            DB::table('post')->delete($id);
            return back()->with('status', 'Tour deleted sucessfully');
            

        }else{

            return back()->with('status', 'Id not found');
        }

    }

    public static function deleteusers($id){

        if(!empty(DB::table('users')->where('id', '=', $id)->first())){

            DB::table('users')->delete($id);
            return redirect('/admin/listusers')->with('status', 'User deleted sucessfully');
            

        }else{
            return redirect('/admin/listusers')->with('status', 'Id not found');
        }

    }

    public static function see($id){

        $post = DB::table('post')->where('id', '=', $id)->get();

        return view('admin',['section'=>'seepost', 'products'=>$post]);
        

    }

    public static function seeTransfers($id){

        $post = DB::table('post')->where('code', 'like', '%TRANSFERS-%')->where('id', '=', $id)->get();

        return view('admin',['section'=>'seepostTransfers', 'products'=>$post]);
        

    }

    public static function status($id, $status){

        if($status){
            DB::table('post')->where('id', '=', $id)->update(['status'=>0]);
            return back()->with('status', 'Status disabled');
        }else{
            DB::table('post')->where('id', '=', $id)->update(['status'=>1]);
            return back()->with('status', 'Status enabled');
        }
        

    }

    public static function statususers($id, $status){

        if($status){
            DB::table('users')->where('id', '=', $id)->update(['status'=>0]);
            return back()->with('status', 'Status disabled');
        }else{
            DB::table('users')->where('id', '=', $id)->update(['status'=>1]);
            return back()->with('status', 'Status enabled');
        }
        

    }

    public static function isspecial($id, $isspecial){

        if($isspecial){
            DB::table('post')->where('id', '=', $id)->update(['is_special'=>0]);
            return back()->with('status', 'Seasonal tour disabled');
        }else{
            DB::table('post')->where('id', '=', $id)->update(['is_special'=>1]);
            return back()->with('status', 'Seasonal tour enabled');
        }
        

    }

    public static function recoverypassword($id){
        $mailsender = new recoveryPasswordMailable();
        Mail::to('bryanmora1994@gmail.com')->send($mailsender);
        return('send it');
    }

    public static function addusers(){
        return view('admin',['section'=>'addusers', 'role'=>Auth::user()->role]);

    }
    
    public static function adduserspost(Request $request){

        $status = $request->get('status');
        if($status == null){ $status = 0; }

        $fields = $request->validate([

            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'role' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'


        ]);

        
        
        $user = User::create([

            'name' => $fields['name'],
            'username' => $fields['username'],
            'role' => $fields['role'],
            'status' => $status,
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])

        ]);

        // $token = $user->createtoken('costumerToken')->plainTextToken;

        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];

        return back()->with(['successful'=>'Tour Added successfully!']);

    }

    public static function seeusers($id){

        $post = DB::table('users')->where('id', '=', $id)->get();

        return view('admin',['section'=>'seeusers', 'products'=>$post]);
        

    }
    
}
