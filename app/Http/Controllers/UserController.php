<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::table('users')->get();
        //Log::debug($user[0]->name);
        Log::debug(print_r($user[0]->name, true));
        //Log::debug($user->id);
        //Log::debug($request);
        //return view('list');
        //配列の取得して三人とも表示させる
        

    
        return view('list',compact('user'));
    }
    public function store(Request $request)
    {
        return view('sign_up');
    }
}
