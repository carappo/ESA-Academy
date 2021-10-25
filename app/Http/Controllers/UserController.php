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
        Log::debug($request);
        
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
        //バリデーション
        //新規登録ボタンを押したときにバリデーションチェック
        //エラーメッセージを設定取得
        //sign_upに渡す
        //sign_upのテキスト入力欄の下に表示
        //セッション。ブラウザにデータを格納
        Log::debug($request);
            $this->validate($request, [
                'name'  => 'required',
                'age' => 'required',
                'email'  => 'required',
                'tel' => 'required',
                'birthday'  => 'required'
            ], [
                'name.required' => '名前は必須です。',
                'age.required'  => '年齢は必須です。',
                'email.required'  => 'メールアドレスは必須です。',
                'tel.required'  => '電話番号は必須です。',
                'birthday.required'  => '誕生日は必須です。',
            ]);
            
            //return view('sign_up',compact('request'));
        //}
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
