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
    //新規登録画面を出したたときにcreatePageを通るようにする

    //新規登録ボタンを押したときはstoreへ
    //リクエストを受け取り変数に格納
    //そのデータを使ってuserテーブルに登録
    //一覧画面に遷移
    public function store(Request $request)
    {   
        
        $name = $request->input('name');
        $age = $request->input('age');
        $birthday = $request->input('birthday');
        $email = $request->input('email');
        $tel = $request->input('tel');
        //Log::debug(print_r($new,true));
        //Log::debug($request);
        if (is_null($name)||is_null($age)||is_null($birthday)||is_null($email)||is_null($tel)){
            return view('sign_up');   
        }
        DB::table('users')->insert([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'tel' => $tel,
            'birthday' => $birthday
        ]);
        return redirect('/');
    }
    public function createPage(Request $request) //データベースに送る
    {
        return view('sign_up');
    }
}
