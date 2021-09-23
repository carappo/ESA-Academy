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
        Log::debug($user);
        Log::debug($request);
        return view('list');
    }
    public function store(Request $request)
    {
        return view('sign_up');
    }
}
