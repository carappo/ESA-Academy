<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {      
        if (is_null($request->input('number'))) {
            $user = DB::table('users')->get();  
        } else {
            $tell = $request->input('number');
            $user = DB::table('users')->where('tel','LIKE',$tell.'%')->get();
        }
        return view('list',compact('user'));      
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'name'  => 'required',
            'age' => 'required',
            'email'  => 'required',
            'tel' => 'required',
            'birthday'  => 'required'
        ]);
        $requestDetas = $request->only(['name', 'age', 'birthday','email','tel']);
        DB::table('users')->insert([
            'name' => $requestDetas['name'],
            'age'=> $requestDetas['age'],
            'email'=> $requestDetas['email'],
            'tel'=> $requestDetas['tel'],
            'birthday'=> $requestDetas['birthday']
         ]);
        return redirect('/')->with('flash_message', '投稿が完了しました');;
    }
    public function createPage(Request $request) 
    {
        return view('sign_up');
    }

    public function delete(Request $request)
    {
        DB::table('users')->where('id',$request->id)->delete();
        return redirect('/');
    }
    
    
    //削除ボタンを押すとデリートメソッドにとんでいく  できればmodal
    //DB
}
//