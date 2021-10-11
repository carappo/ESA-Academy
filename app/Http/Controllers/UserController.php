<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {              //メソッド
        //電話番号08027954991が入力されていたらuserstableから持ってくる
        //入力されていなかったら全件取得
        //Log::debug(print_r($request,true));
        if (is_null($request->input('namber'))) {
            $user = DB::table('users')->get();  
        } else {
            $tell = $request->input('namber');
            $user = DB::table('users')->where('tel','LIKE',$tell.'%')->get();
        }
        return view('list',compact('user'));      
    }

    public function store(Request $request)
    {  
        
        $requestDetas = $request->only(['name', 'age', 'birthday','email','tel']);
        DB::table('users')->insert([
            'name' => $requestDetas['name'],
            'age'=> $requestDetas['age'],
            'email'=> $requestDetas['email'],
            'tel'=> $requestDetas['tel'],
            'birthday'=> $requestDetas['birthday']
         ]);
        return redirect('/');
    }
    public function createPage(Request $request) 
    {
        return view('sign_up');
    }
}
